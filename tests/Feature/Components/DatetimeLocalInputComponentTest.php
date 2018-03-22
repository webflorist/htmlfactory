<?php

namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class DatetimeLocalLocalInputComponentTest extends TestCase
{

    public function testSimpleDatetimeLocalInputComponent()
    {
        $html = \Html::datetimeLocalInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="datetime-local" />',
            $html
        );
    }

    public function testSimpleDatetimeLocalInputComponentForBootstrap3()
    {
        $this->setFrontendFramework('bootstrap', '3');
        $html = \Html::datetimeLocalInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="datetime-local" class="form-control" />',
            $html
        );
    }

    public function testComplexDatetimeLocalInputComponent()
    {
        $html = \Html::datetimeLocalInput();
        $this->applyGeneralAttributes($html);
        $this->applyInputAttributes($html);
        $html
            ->autocomplete(true)
            ->max(12)
            ->min(12)
            ->step(2)
            ->generate();

        $this->assertHtmlEquals(
            '<input type="datetime-local" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" autocomplete="on" max="12" min="12" step="2" />',
            $html
        );
    }

}