<?php namespace App\Modules\User\Providers;

use Illuminate\Support\ServiceProvider;

  class UserServiceProvider extends ServiceProvider {
    public function register () {
        $this->app->bind(
            'App\Modules\User\Repositories\ProfileRepositoryInterface',
            'App\Modules\USer\Repositories\ProfileRepository'
        );
    }
  }

?>