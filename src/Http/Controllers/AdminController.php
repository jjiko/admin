<?php namespace Jiko\Admin\Http\Controllers;

use Jiko\Http\Controllers\Controller;

class AdminController extends Controller
{
  public function __construct()
  {
    $this->middleware('role:jiko');
  }
}