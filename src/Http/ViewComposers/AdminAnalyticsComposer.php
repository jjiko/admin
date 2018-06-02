<?php

namespace Jiko\Admin\Http\ViewComposers;

use Illuminate\View\View;

class AdminAnalyticsComposer
{
  protected $analytics;

  public function __construct()
  {
    // Authorize with google
    try {
      putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_service_account.json'));

      $client = new \Google_Client();
      $client->useApplicationDefaultCredentials();
      $client->addScope(\Google_Service_Analytics::ANALYTICS_READONLY);
    } catch (\Google_Exception $e) {
      dd($e);
    }

    $this->analytics = new \Google_Service_Analytics($client);

  }

  public function compose(View $view)
  {
    $optParams = [
      'dimensions' => 'rt:eventCategory, rt:eventAction, rt:eventLabel, rt:minutesAgo, rt:city',
      'sort' => 'rt:minutesAgo'
    ];
    try {
      $results = $this->analytics->data_realtime->get(
        'ga:121755034',
        'rt:totalEvents',
        $optParams);
      // success
    } catch (\Google_Service_Exception $e) {
      dd($e->getMessage());
    }

    try {
      $viewContent = view('admin::google.analytics.realtime-report', ['results' => $results])->render();
    } catch (\Throwable $e) {
      $viewContent = $e->getMessage();
    }
    $view->with([
      'results' => $viewContent
    ]);
  }
}