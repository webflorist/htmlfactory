<?php

namespace HtmlFactoryTests\Feature\Components;

use HtmlFactoryTests\TestCase;

class TextInputComponentTest extends TestCase
{

    public function testSimpleTextInputComponent()
    {
        $html = \Html::textInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="text" />',
            $html
        );
    }

    public function testSimpleTextInputComponentForBootstrap3()
    {
        $this->setFrontendFramework('bootstrap', '3');
        $html = \Html::textInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="text" class="form-control" />',
            $html
        );
    }

    public function testComplexTextInputComponent()
    {
        $html = \Html::textInput();
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
            '<input type="text" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" autocomplete="on" maxlength="12" pattern="[A-Za-z]{3}" placeholder="My Placeholder" size="12" />',
            $html
        );
    }

}