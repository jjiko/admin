<?php namespace Jiko\Admin\Http\Controllers;

use Jiko\Http\Controllers\Controller;

class AdminController extends Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->middleware('auth');
  }
}