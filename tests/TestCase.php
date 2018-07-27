<?php

namespace HtmlFactoryTests;

use HtmlFactoryTests\Traits\AppliesAttributeSets;
use HtmlFactoryTests\Traits\AssertsHtml;
use Illuminate\View\Factory;
use Nicat\HtmlFactory\HtmlFactoryFacade;
use Nicat\HtmlFactory\HtmlFactoryServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{

    use AssertsHtml, AppliesAttributeSets;

    protected $frontendFramework;

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
        $app['config']->set('htmlfactory.frontend_framework', $this->frontendFramework);
        /** @var Factory $viewService */
        $viewService = $app['view'];
        $viewService->addNamespace('ElementsTestViews', __DIR__ . '/Feature/Elements/views');
        $viewService->addNamespace('ComponentsTestViews', __DIR__ . '/Feature/Components/views');

    }

    protected function setFrontendFramework(string $frameworkId, string $frameworkVersion = null)
    {
        $frontendFramework = $frameworkId;
        if (!is_null($frameworkVersion)) {
            $frontendFramework .= ':' . $frameworkVersion;
        }
        $this->frontendFramework = $frontendFramework;
        $this->refreshApplication();
    }


}