<?php namespace Artlabs\Gravatar;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;


class GravatarServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the service provider.
     *
     * @return null
     */
    public function boot()
    {
        $this->registerHelpers();
    }

    /**
     * Register the helpers file.
     */
    public function registerHelpers()
    {
        require __DIR__.'/helpers.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('gravatar', function($app) {
            return new Gravatar;
        });

        $loader = AliasLoader::getInstance();
        $loader->alias('Gravatar', 'Artlabs\Gravatar\Facades\Gravatar');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return ['gravatar'];
    }


}