<?php

namespace Jiko\Admin;
class GoogleAnalyticsRow
{
  public function __construct($item, $headers)
  {
    foreach ($item as $i => $prop) {
      $name = str_replace('rt:', '', $headers[$i]->name);
      $this->{$name} = $prop;
    }
  }
}