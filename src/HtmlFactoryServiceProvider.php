<?php

namespace Webflorist\HtmlFactory;

use Illuminate\Support\ServiceProvider;

class HtmlFactoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param HtmlFactory $htmlFactory
     * @return void
     * @throws Exceptions\ComponentAccessorAlreadyUsedException
     * @throws Exceptions\ComponentNotFoundException
     * @throws Exceptions\DecoratorNotFoundException
     */
    public function boot(HtmlFactory $htmlFactory)
    {

        // Publish the config.
        $this->publishes([
            __DIR__.'/config/htmlfactory.php' => config_path('htmlfactory.php'),
        ]);

        // Register included components.
        $htmlFactory->components->registerFromFolder(
            'Webflorist\HtmlFactory\Components',
            __DIR__.'/Components'
        );

        // Register included decorators.
        $htmlFactory->decorators->registerFromFolder(
            'Webflorist\HtmlFactory\Decorators\Bootstrap\v3',
            __DIR__.'/Decorators/Bootstrap/v3'
        );
        $htmlFactory->decorators->registerFromFolder(
            'Webflorist\HtmlFactory\Decorators\Bootstrap\v4',
            __DIR__.'/Decorators/Bootstrap/v4'
        );
        $htmlFactory->decorators->registerFromFolder(
            'Webflorist\HtmlFactory\Decorators\Foundation\v6',
            __DIR__.'/Decorators/Foundation/v6'
        );
        $htmlFactory->decorators->registerFromFolder(
            'Webflorist\HtmlFactory\Decorators\Bulma\v0',
            __DIR__.'/Decorators/Bulma/v0'
        );

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        // Merge the config.
        $this->mergeConfigFrom(__DIR__.'/config/htmlfactory.php', 'htmlfactory');

        // Register the HtmlFactory service as a singleton.
        $this->app->singleton(HtmlFactory::class, function()
        {
            return new HtmlFactory();
        });

    }
}