<?php

namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class EmailInputComponentTest extends TestCase
{

    public function testSimpleEmailInputComponent()
    {
        $html = \Html::emailInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="email" />',
            $html
        );
    }

    public function testSimpleEmailInputComponentForBootstrap3()
    {
        $this->setFrontendFramework('bootstrap', '3');
        $html = \Html::emailInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="email" class="form-control" />',
            $html
        );
    }

    public function testComplexEmailInputComponent()
    {
        $html = \Html::emailInput();
        $this->applyGeneralAttributes($html);
        $this->applyInputAttributes($html);
        $html
            ->autocomplete(true)
            ->maxlength(12)
            ->multiple(true)
            ->pattern('[A-Za-z]{3}')
            ->placeholder('My Placeholder')
            ->size(12)
            ->generate();

        $this->assertHtmlEquals(
            '<input type="email" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" autocomplete="on" maxlength="12" multiple pattern="[A-Za-z]{3}" placeholder="My Placeholder" size="12" />',
            $html
        );
    }

}