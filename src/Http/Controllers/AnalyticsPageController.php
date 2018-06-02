<?php

namespace Jiko\Admin\Http\Controllers;

use Jiko\Http\Controllers\Controller;

class AnalyticsPageController extends Controller
{
  protected $layout = 'admin::layouts.default';

  public function errors()
  {
    return view('admin::google.analytics-error');
  }

  public function warnings()
  {
    return view('admin::google.analytics-warning');
  }

  public function index()
  {
    return view('admin::google.analytics');
  }
}
