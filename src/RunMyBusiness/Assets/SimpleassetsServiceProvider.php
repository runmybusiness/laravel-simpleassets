<?php namespace RunMyBusiness\Assets;

use Illuminate\Support\ServiceProvider;

class SimpleassetsServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('runmybusiness/assets');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['simpleassets'] = $this->app->share(function ($app) {
            $options['enable'] = $this->app['config']->get('simpleassets.enable');
            $options['hash'] = $this->app['config']->get('simpleassets.hash');
            $options['cdn'] = $this->app['config']->get('simpleassets.cdn');
            $options['prefix'] = $this->app['config']->get('simpleassets.prefix');
            return new Simpleassets($options);
        });

        // Register artisan command
        $this->app['command.simpleassets.generate'] = $this->app->share(
            function ($app) {
                return new Console\GenerateCommand($app['files']);
            }
        );
        $this->commands(
            'command.simpleassets.generate'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('simpleassets', 'command.simpleassets.generate');
    }
}
