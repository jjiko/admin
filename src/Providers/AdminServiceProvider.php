<?php namespace Jiko\Admin\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Input;

class AdminServiceProvider extends ServiceProvider
{
  protected $hostArray;

  public function boot()
  {
    parent::boot();

    $this->loadViewsFrom(__DIR__ . '/../Admin/views', 'admin');
    $this->hostArray = ['local.joejiko.com'];
  }

  public function map()
  {
    if (in_array(Input::server('HTTP_HOST'), $this->hostArray)) {
      require_once(__DIR__ . '/../Http/routes.php');
    }
  }

  public function register()
  {

  }
}