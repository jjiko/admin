<?php namespace Jiko\Admin;

use Illuminate\Routing\Router;
use Jiko\Admin\Commands\ServerPublicIP;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
  protected $defer = false;

  public function boot()
  {
    $this->commands([
      ServerPublicIP::class
    ]);
    $this->loadViewsFrom(__DIR__ . '/views', 'admin');
    $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

    view()->composer('admin::google.analytics', 'Jiko\Admin\Http\ViewComposers\AdminAnalyticsComposer');
    view()->composer('admin::google.analytics-error', 'Jiko\Admin\Http\ViewComposers\AdminAnalyticsErrorComposer');
    view()->composer('admin::google.analytics-warning', 'Jiko\Admin\Http\ViewComposers\AdminAnalyticsWarningComposer');
  }

  public function register()
  {
    $configPath = __DIR__ . '/../config/admin.php';
    $this->mergeConfigFrom($configPath, 'admin');

    // $this->app->alias(ClassName::class);
//    $this->app->singleton(AdminBar::class, function () {
//        $adminbar = new AdminBar($this->app);
//
//        return $adminbar;
//      }
//    );
    // $this->app->alias(AdminBar::class, 'adminbar');
    // $this->commands(['command.admin.do'])
  }

  /**
   * Get the active router.
   *
   * @return Router
   */
  public function getRouter()
  {
    return $this->app['router'];
  }

  public function getConfigPath()
  {
    return config_path('admin.php');
  }

  protected function publishConfig($configPath)
  {
    $this->publishes([$configPath => config_path('admin.php')], 'config');
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides(): array
  {
    return ['admin'];
  }
}