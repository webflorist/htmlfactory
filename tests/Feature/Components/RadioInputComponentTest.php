<?php

namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class RadioInputComponentTest extends TestCase
{

    public function testSimpleRadioInputComponent()
    {
        $html = \Html::radioInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="radio" />',
            $html
        );
    }

    public function testSimpleRadioInputComponentForBootstrap3()
    {
        $this->setFrontendFramework('bootstrap', '3');
        $html = \Html::radioInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="radio" />',
            $html
        );
    }

    public function testComplexRadioInputComponent()
    {
        $html = \Html::radioInput();
        $this->applyGeneralAttributes($html);
        $this->applyInputAttributes($html);
        $html
            ->checked(true)
            ->generate();

        $this->assertHtmlEquals(
            '<input type="radio" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" checked />',
            $html
        );
    }

}