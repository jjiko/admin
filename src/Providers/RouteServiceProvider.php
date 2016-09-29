<?php namespace Jiko\Admin\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Input;

class RouteServiceProvider extends ServiceProvider
{
  protected $hostArray = [];

  public function boot()
  {
    parent::boot();

    $this->loadViewsFrom(__DIR__ . '/../Admin/views', 'admin');

    $this->hostArray = ['local.joejiko.com'];
  }

  public function map(Router $router)
  {
    if (in_array(Input::server('HTTP_HOST'), $this->hostArray)) {
      $router->group(['namespace' => $this->namespace], function ($router) {
        require_once(__DIR__ . '/../Http/routes.php');
      });
    }
  }

}