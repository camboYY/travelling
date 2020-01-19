<?php 
namespace Sharewithme\User;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

  class UserServiceProvider extends ServiceProvider {
    public function register () {

      $providers = ['Profile', 'ResetPassword'];
      
      foreach ( $providers as $provider) {
        $this->app->bind(
            "Sharewithme\User\Repositories\\{$provider}RepositoryInterface",
            "Sharewithme\User\Repositories\\{$provider}Repository"
        );
      }

      $middlwares = ['AdminMiddleware'];
      foreach($middlwares as $middlware) {
        $this->app['router']->middleware('api', "Sharewithme\User\\{$middlware}");
      }

      if ($this->app->config->get('User') === null) {
        $this->app->config->set('User', require __DIR__ . '/config/User.php');
      }

      $this->mergeConfigFrom(
        __DIR__ . '/config/User.php', 'User'
      );
    }

    public function boot () {
      $this->loadRoutesFrom(__DIR__.'/routes.php');
      $this->loadMigrationsFrom(__DIR__.'/database/migrations');
      $this->loadFactoriesFrom(__DIR__.'/database/factories');
      $this->loadTranslationsFrom(__DIR__.'/translations', 'user');
      $this->loadViewsFrom(__DIR__.'/views', 'user');

      $this->publishes([
        __DIR__.'/translations' => resource_path('lang/vendor/user'),
      ]);

      $this->publishes([
        __DIR__.'/database/migrations/' => database_path('migrations')
      ], 'migrations');

      $this->publishes([
        __DIR__ . '/config/User.php' => config_path('User.php'),
      ], 'config');

    } 

    protected function loadFactoriesFrom ($path) {
      $this->app->make(Factory::class)->load($path);
    }
  }

?>