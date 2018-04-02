<?php

namespace Nicat\HtmlFactory;

use Illuminate\Support\ServiceProvider;

class HtmlFactoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        // Publish the config.
        $this->publishes([
            __DIR__.'/config/htmlfactory.php' => config_path('htmlfactory.php'),
        ]);

        // Merge the config.
        $this->mergeConfigFrom(__DIR__.'/config/htmlfactory.php', 'htmlfactory');

        // Register included components.
        $this->app[HtmlFactory::class]->components->registerFromFolder(
            'Nicat\HtmlFactory\Components',
            __DIR__.'/Components'
        );

        // Register included decorators.
        $this->app[HtmlFactory::class]->decorators->registerFromFolder(
            'Nicat\HtmlFactory\Decorators\Bootstrap\v3',
            __DIR__.'/Decorators/Bootstrap/v3'
        );
        $this->app[HtmlFactory::class]->decorators->registerFromFolder(
            'Nicat\HtmlFactory\Decorators\Bootstrap\v4',
            __DIR__.'/Decorators/Bootstrap/v4'
        );
        $this->app[HtmlFactory::class]->decorators->registerFromFolder(
            'Nicat\HtmlFactory\Decorators\Foundation\v6',
            __DIR__.'/Decorators/Foundation/v6'
        );

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(HtmlFactory::class, function()
        {
            return new HtmlFactory();
        });

    }
}