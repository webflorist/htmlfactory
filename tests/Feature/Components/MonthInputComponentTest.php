<?php

namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class MonthInputComponentTest extends TestCase
{

    public function testSimpleMonthInputComponent()
    {
        $html = \Html::monthInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="month" />',
            $html
        );
    }

    public function testSimpleMonthInputComponentForBootstrap3()
    {
        $this->setDecorators(['bootstrap:v3']);
        $html = \Html::monthInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="month" class="form-control" />',
            $html
        );
    }

    public function testComplexMonthInputComponent()
    {
        $html = \Html::monthInput();
        $this->applyGeneralAttributes($html);
        $this->applyInputAttributes($html);
        $html
            ->max(12)
            ->min(12)
            ->step(2)
            ->generate();

        $this->assertHtmlEquals(
            '<input type="month" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" max="12" min="12" step="2" />',
            $html
        );
    }

}