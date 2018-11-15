<?php

namespace HtmlFactoryTests;

use HtmlFactoryTests\Traits\AppliesAttributeSets;
use HtmlFactoryTests\Traits\AssertsHtml;
use Illuminate\View\Factory;
use Webflorist\HtmlFactory\HtmlFactoryFacade;
use Webflorist\HtmlFactory\HtmlFactoryServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

/**
 * Class TestCase
 * @package HtmlFactoryTests
 */
class TestCase extends BaseTestCase
{

    use AssertsHtml, AppliesAttributeSets;

    /**
     * Array of group-IDs of decorators, that should be loaded.
     *
     * @var string[]
     */
    protected $decorators = [];

    protected function getPackageProviders($app)
    {
        return [HtmlFactoryServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Html' => HtmlFactoryFacade::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('htmlfactory.decorators', $this->decorators);
        /** @var Factory $viewService */
        $viewService = $app['view'];
        $viewService->addNamespace('ElementsTestViews', __DIR__ . '/Feature/Elements/views');
        $viewService->addNamespace('ComponentsTestViews', __DIR__ . '/Feature/Components/views');

    }

    protected function setDecorators(array $decorators)
    {
        $this->decorators = $decorators;
        $this->refreshApplication();
    }


}