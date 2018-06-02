<?php

namespace Jiko\Admin\Http\ViewComposers;

use Illuminate\View\View;
use Jiko\Admin\GoogleAnalyticsRowCollection;

class AdminAnalyticsErrorComposer extends AdminAnalyticsComposer
{
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

    $collection = (new GoogleAnalyticsRowCollection($results))->includeCategoryType('ARERR')->includeCategoryType('ENT:');

    try {
      $viewContent = view('admin::google.analytics.realtime-error-report', ['collection' => $collection, 'categoryType' => "ARERR"])->render();
    } catch (\Throwable $e) {
      $viewContent = $e->getMessage();
    }
    $view->with([
      'results' => $viewContent
    ]);
  }
}