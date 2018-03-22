<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class InputElementTest extends TestCase
{

    public function testSimpleInputElement()
    {
        $html = \Html::input()
            ->generate();

        $this->assertHtmlEquals(
            '<input />',
            $html
        );
    }

    public function testSimpleInputElementForBootstrap3()
    {
        $this->setFrontendFramework('bootstrap', '3');
        $html = \Html::input()
            ->generate();

        $this->assertHtmlEquals(
            '<input class="form-control" />',
            $html
        );
    }

    public function testComplexInputElement()
    {
        $html = \Html::input();
        $this->applyGeneralAttributes($html);
        $this->applyInputAttributes($html);
        $html->generate();

        $this->assertHtmlEquals(
            '<input aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" />',
            $html
        );
    }

}