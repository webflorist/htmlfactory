<?php

namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class DateInputComponentTest extends TestCase
{

    public function testSimpleDateInputComponent()
    {
        $html = \Html::dateInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="date" />',
            $html
        );
    }

    public function testSimpleDateInputComponentForBootstrap3()
    {
        $this->setDecorators(['bootstrap:v3']);
        $html = \Html::dateInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="date" class="form-control" />',
            $html
        );
    }

    public function testComplexDateInputComponent()
    {
        $html = \Html::dateInput();
        $this->applyGeneralAttributes($html);
        $this->applyInputAttributes($html);
        $html
            ->autocomplete(true)
            ->max(12)
            ->min(12)
            ->pattern('[A-Za-z]{3}')
            ->step(2)
            ->generate();

        $this->assertHtmlEquals(
            '<input type="date" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" autocomplete="on" max="12" min="12" pattern="[A-Za-z]{3}" step="2" />',
            $html
        );
    }

}