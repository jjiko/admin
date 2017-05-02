<?php

namespace Jiko\Admin\Http\Controllers;

class FacebookUserController extends AdminController
{
  protected $layout = 'admin::layouts.default';

  public function index()
  {
    return $this->setContent();
  }
}
