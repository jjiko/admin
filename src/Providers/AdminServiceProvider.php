<?php namespace Jiko\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider {
  public function register() {
    $this->app->register('Jiko\Admin\Providers\RouteServiceProvider');
  }
}