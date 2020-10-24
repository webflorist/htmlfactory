<?php

namespace HtmlFactoryTests\Feature\Components;

use HtmlFactoryTests\TestCase;

class urlInputComponentTest extends TestCase
{

    public function testSimpleurlInputComponent()
    {
        $html = \Html::urlInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="url" />',
            $html
        );
    }

    public function testSimpleurlInputComponentForBootstrap3()
    {
        $this->setDecorators(['bootstrap:v3']);
        $html = \Html::urlInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="url" class="form-control" />',
            $html
        );
    }

    public function testComplexurlInputComponent()
    {
        $html = \Html::urlInput();
        $this->applyGeneralAttributes($html);
        $this->applyInputAttributes($html);
        $html
            ->autocomplete(true)
            ->maxlength(12)
            ->pattern('[A-Za-z]{3}')
            ->placeholder('My Placeholder')
            ->size(12)
            ->generate();

        $this->assertHtmlEquals(
            '<input type="url" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" autocomplete="on" maxlength="12" pattern="[A-Za-z]{3}" placeholder="My Placeholder" size="12" />',
            $html
        );
    }

}