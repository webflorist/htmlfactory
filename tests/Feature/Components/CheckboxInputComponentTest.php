<?php

namespace HtmlFactoryTests\Feature\Components;

use HtmlFactoryTests\TestCase;

class CheckboxInputComponentTest extends TestCase
{

    public function testSimpleCheckboxInputComponent()
    {
        $html = \Html::checkboxInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="checkbox" />',
            $html
        );
    }

    public function testSimpleCheckboxInputComponentForBootstrap3()
    {
        $this->setFrontendFramework('bootstrap', '3');
        $html = \Html::checkboxInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="checkbox" />',
            $html
        );
    }

    public function testComplexCheckboxInputComponent()
    {
        $html = \Html::checkboxInput();
        $this->applyGeneralAttributes($html);
        $this->applyInputAttributes($html);
        $html
            ->checked(true)
            ->generate();

        $this->assertHtmlEquals(
            '<input type="checkbox" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" checked />',
            $html
        );
    }

}