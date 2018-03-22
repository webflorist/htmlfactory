<?php

namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class NumberInputComponentTest extends TestCase
{

    public function testSimpleNumberInputComponent()
    {
        $html = \Html::numberInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="number" />',
            $html
        );
    }

    public function testSimpleNumberInputComponentForBootstrap3()
    {
        $this->setFrontendFramework('bootstrap', '3');
        $html = \Html::numberInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="number" class="form-control" />',
            $html
        );
    }

    public function testComplexNumberInputComponent()
    {
        $html = \Html::numberInput();
        $this->applyGeneralAttributes($html);
        $this->applyInputAttributes($html);
        $html
            ->maxlength(12)
            ->max(12)
            ->min(12)
            ->step(2)
            ->generate();

        $this->assertHtmlEquals(
            '<input type="number" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" maxlength="12" max="12" min="12" step="2" />',
            $html
        );
    }

}