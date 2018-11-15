<?php

namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class TimeInputComponentTest extends TestCase
{

    public function testSimpletimeInputComponent()
    {
        $html = \Html::timeInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="time" />',
            $html
        );
    }

    public function testSimpletimeInputComponentForBootstrap3()
    {
        $this->setDecorators(['bootstrap:v3']);
        $html = \Html::timeInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="time" class="form-control" />',
            $html
        );
    }

    public function testComplextimeInputComponent()
    {
        $html = \Html::timeInput();
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
            '<input type="time" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" autocomplete="on" max="12" min="12" pattern="[A-Za-z]{3}" step="2" />',
            $html
        );
    }

}