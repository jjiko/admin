<?php

namespace Jiko\Admin\Http\Controllers;

class AdminPageController extends AdminController {
  public function index() {
    return $this->content('admin::index');
  }
}
