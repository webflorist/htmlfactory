<?php

namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class ColorInputComponentTest extends TestCase
{

    public function testSimpleColorInputComponent()
    {
        $html = \Html::colorInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="color" />',
            $html
        );
    }

    public function testSimpleColorInputComponentForBootstrap3()
    {
        $this->setDecorators(['bootstrap:v3']);
        $html = \Html::colorInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="color" class="form-control" />',
            $html
        );
    }

    public function testComplexColorInputComponent()
    {
        $html = \Html::colorInput();
        $this->applyGeneralAttributes($html);
        $this->applyInputAttributes($html);
        $html
            ->autocomplete(true)
            ->generate();

        $this->assertHtmlEquals(
            '<input type="color" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" autocomplete="on" />',
            $html
        );
    }

}