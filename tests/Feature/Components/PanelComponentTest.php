<?php

namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class PanelComponentTest extends TestCase
{
    public function testPanelWithContentOnly()
    {
        $html = \Html::panel()
            ->content('This is the content.')
            ->generate();

        $this->assertHtmlEquals(
            '<div><div>This is the content.</div></div>',
            $html
        );
    }

    public function testPanelWithHeaderAndFooter()
    {
        $html = \Html::panel()
            ->header('This is the header.')
            ->footer('This is the footer.')
            ->content('This is the content.')
            ->generate();

        $this->assertHtmlEquals(
            '<div><div>This is the header.</div><div>This is the content.</div><div>This is the footer.</div></div>',
            $html
        );
    }

    public function testPanelWithContentOnlyForBootstrap3()
    {
        $this->setFrontendFramework('bootstrap', '3');
        $html = \Html::panel()
            ->content('This is the content.')
            ->generate();

        $this->assertHtmlEquals(
            '<div class="panel panel-default"><div class="panel-body">This is the content.</div></div>',
            $html
        );
    }

    public function testPanelWithHeaderAndFooterAndContextForBootstrap3()
    {
        $this->setFrontendFramework('bootstrap', '3');
        $html = \Html::panel()
            ->header('This is the header.')
            ->footer('This is the footer.')
            ->content('This is the content.')
            ->context('primary')
            ->generate();

        $this->assertHtmlEquals(
            '<div class="panel panel-primary"><div class="panel-heading">This is the header.</div><div class="panel-body">This is the content.</div><div class="panel-footer">This is the footer.</div></div>',
            $html
        );
    }
}