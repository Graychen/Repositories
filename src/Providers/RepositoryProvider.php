<?php
namespace graychen\repositories\Providers;

use Illuminate\Support\Composer;
use Illuminate\filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        $config_path = __DIR__.'/../config/repositories.php';
        $this->publishes([$config_path=>$config_path('repositories.php')],'repositories');
    }

    public function register()
    {
        $this->registerBindings();

    }

    protected function registerBindings()
    {
        $this->app->instance('FileSystem',new Filesystem());

        $this->app->bind('Composer',function($app)
        {
            return new Composer($app['FileSystem']);
        });

        $this->app->singleton('RepositoryCreator',function($app)
        {
            return new RepositoryCreator($app['FileSystem']);
        });
        $this->app->singleton('CriteriaCreator',function($app){
            return new CriteriaCreator($app['FileSystem']);
        });
    }
}