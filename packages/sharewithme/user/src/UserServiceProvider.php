<?php 
namespace Sharewithme\User;

use Illuminate\Support\ServiceProvider;

  class UserServiceProvider extends ServiceProvider {
    public function register () {
    
      $providers = ['Profile', 'ResetPassword'];
      
      foreach ( $providers as $provider) {
        $this->app->bind(
            "Sharewithme\User\Repositories\\{$provider}RepositoryInterface",
            "Sharewithme\User\Repositories\\{$provider}Repository"
        );
      }

      
    }

    public function boot () {
      $this->loadRoutesFrom(__DIR__.'/routes.php');
      $this->loadMigrationsFrom(__DIR__.'database/migrations');
        // $this->loadViewsFrom(__DIR__.'/views', 'todolist');
        // $this->publishes([
        //     __DIR__.'/views' => base_path('resources/views/wisdmlabs/todolist'),
        // ]);
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'user');

      $this->publishes([
        __DIR__.'/config/User.php' => config_path('User.php'),
        __DIR__.'/resources/views' => resource_path('views/vendor/user'),
        __DIR__.'/resources/lang' => resource_path('lang/vendor/user'),
        
      ]);
      $this->publishes([
        __DIR__.'/resources/assets' => public_path('vendor/user'),
        ], 'public');
      } 

  }

?>