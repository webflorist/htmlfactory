<?php

namespace HtmlFactoryTests\Feature\Components;

use HtmlFactoryTests\TestCase;

class TelInputComponentTest extends TestCase
{

    public function testSimpleTelInputComponent()
    {
        $html = \Html::telInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="tel" />',
            $html
        );
    }

    public function testSimpleTelInputComponentForBootstrap3()
    {
        $this->setFrontendFramework('bootstrap', '3');
        $html = \Html::telInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="tel" class="form-control" />',
            $html
        );
    }

    public function testComplexTelInputComponent()
    {
        $html = \Html::telInput();
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
            '<input type="tel" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" autocomplete="on" maxlength="12" pattern="[A-Za-z]{3}" placeholder="My Placeholder" size="12" />',
            $html
        );
    }

}