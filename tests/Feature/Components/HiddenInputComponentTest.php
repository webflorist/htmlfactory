<?php

namespace HtmlFactoryTests\Feature\Components;

use HtmlFactoryTests\TestCase;

class HiddenInputComponentTest extends TestCase
{

    public function testSimpleHiddenInputComponent()
    {
        $html = \Html::hiddenInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="hidden" />',
            $html
        );
    }

    public function testSimpleHiddenInputComponentForBootstrap3()
    {
        $this->setDecorators(['bootstrap:v3']);
        $html = \Html::hiddenInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="hidden" class="form-control" />',
            $html
        );
    }

    public function testComplexHiddenInputComponent()
    {
        $html = \Html::hiddenInput();
        $this->applyGeneralAttributes($html);
        $this->applyInputAttributes($html);
        $html->generate();

        $this->assertHtmlEquals(
            '<input type="hidden" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" />',
            $html
        );
    }

}