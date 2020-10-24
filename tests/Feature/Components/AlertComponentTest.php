<?php

namespace HtmlFactoryTests\Feature\Components;

use HtmlFactoryTests\TestCase;

class AlertComponentTest extends TestCase
{
    public function testAlert()
    {
        $html = \Html::alert('success')
            ->content('This is an alert!')
            ->generate();

        $this->assertHtmlEquals(
            '<div role="alert">This is an alert!</div>',
            $html
        );
    }

    public function testDismissibleAlertForBootstrap3()
    {
        $this->setDecorators(['bootstrap:v3']);
        $html = \Html::alert('success')
            ->content('This is an alert!')
            ->dismissible()
            ->generate();

        $this->assertHtmlEquals(
            '<div role="alert" class="alert m-b-1 alert-success"><button type="button" class="close btn" data-dismiss="alert"><span>&times;</span></button>This is an alert!</div>',
            $html
        );
    }

    public function testDismissibleAlertForFoundation6()
    {
        $this->setDecorators(['foundation:v6']);
        $html = \Html::alert('success')
            ->content('This is an alert!')
            ->dismissible()
            ->generate();

        $this->assertHtmlEquals(
            '<div role="alert" class="callout success" data-closable="1">This is an alert!<button type="button" class="close-button" data-close="1"><span>&times;</span></button></div>',
            $html
        );
    }
}