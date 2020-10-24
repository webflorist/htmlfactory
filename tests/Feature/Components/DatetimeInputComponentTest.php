<?php

namespace HtmlFactoryTests\Feature\Components;

use HtmlFactoryTests\TestCase;

class DatetimeInputComponentTest extends TestCase
{

    public function testSimpleDatetimeInputComponent()
    {
        $html = \Html::datetimeInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="datetime" />',
            $html
        );
    }

    public function testSimpleDatetimeInputComponentForBootstrap3()
    {
        $this->setFrontendFramework('bootstrap', '3');
        $html = \Html::datetimeInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="datetime" class="form-control" />',
            $html
        );
    }

    public function testComplexDatetimeInputComponent()
    {
        $html = \Html::datetimeInput();
        $this->applyGeneralAttributes($html);
        $this->applyInputAttributes($html);
        $html
            ->autocomplete(true)
            ->max(12)
            ->min(12)
            ->step(2)
            ->generate();

        $this->assertHtmlEquals(
            '<input type="datetime" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" autocomplete="on" max="12" min="12" step="2" />',
            $html
        );
    }

}