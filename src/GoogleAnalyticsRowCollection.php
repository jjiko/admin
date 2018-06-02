<?php

namespace Jiko\Admin;

use Illuminate\Support\Collection;

class GoogleAnalyticsRowCollection extends Collection
{

  public function includeCategoryType($type = "ARERR")
  {
    return $this->reject(function ($row) use ($type) {
      return !(boolean)strstr($row->eventCategory, $type);
    });
  }

  public function groupByCity()
  {
    return $this->mapToGroups(function ($item, $key) {
      $category = explode(".", $item->eventCategory);
      return [$item->city => [
        "form" => $category[0],
        "code" => str_replace("ARERR", '', $category[1]),
        'label' => $item->eventLabel,
        'user' => $item->eventAction,
        'minutesAgo' => $item->minutesAgo,
        'count' => $item->totalEvents
      ]];
    });
  }

  public function groupByForm()
  {

    $collection = $this->mapToGroups(function ($item, $key) {
      $category = explode(".", $item->eventCategory);
      $form = $category[0];
      return [$form => [
        "code" => str_replace("ARERR", '', $category[1]),
        'label' => $item->eventLabel,
        "user" => $item->eventAction,
        'city' => $item->city,
        'minutesAgo' => $item->minutesAgo,
        'count' => $item->totalEvents
      ]];
    });
    return $collection;
  }

  public function groupByUser()
  {
    return $this->mapToGroups(function ($item, $key) {
      $category = explode(".", $item->eventCategory);
      return [$item->eventAction => [
        "form" => $category[0],
        "code" => str_replace("ARERR", '', $category[1]),
        'label' => $item->eventLabel,
        'city' => $item->city,
        'minutesAgo' => $item->minutesAgo,
        'count' => $item->totalEvents
      ]];
    });
  }

  public function groupByCode()
  {
    return $this->mapToGroups(function ($item, $key) {
      $category = explode(".", $item->eventCategory);
      $code = str_replace("ARERR", '', $category[1]);
      return [$code => [
        "form" => $category[0],
        'label' => $item->eventLabel,
        'user' => $item->eventAction,
        'city' => $item->city,
        'minutesAgo' => $item->minutesAgo,
        'count' => $item->totalEvents
      ]];
    });
  }

  public function __construct($data)
  {
    if ($data instanceof \Google_Service_Analytics_RealtimeData) {
      $items = [];
      $headers = $data->getColumnHeaders();
      $rows = $data->getRows();
      foreach ($rows as $row) {
        $items[] = new GoogleAnalyticsRow($row, $headers);
      }
    } else {
      $items = $data;
    }

    parent::__construct($items);
  }
}