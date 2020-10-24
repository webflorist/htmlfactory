<?php

namespace HtmlFactoryTests\Feature\Components;

use HtmlFactoryTests\TestCase;

class RangeInputComponentTest extends TestCase
{

    public function testSimpleRangeInputComponent()
    {
        $html = \Html::rangeInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="range" />',
            $html
        );
    }

    public function testSimpleRangeInputComponentForBootstrap3()
    {
        $this->setDecorators(['bootstrap:v3']);
        $html = \Html::rangeInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="range" class="form-control" />',
            $html
        );
    }

    public function testComplexRangeInputComponent()
    {
        $html = \Html::rangeInput();
        $this->applyGeneralAttributes($html);
        $this->applyInputAttributes($html);
        $html
            ->autocomplete(true)
            ->max(12)
            ->min(12)
            ->step(2)
            ->generate();

        $this->assertHtmlEquals(
            '<input type="range" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" autocomplete="on" max="12" min="12" step="2" />',
            $html
        );
    }

}