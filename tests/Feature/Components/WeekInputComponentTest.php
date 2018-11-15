<?php

namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class weekInputComponentTest extends TestCase
{

    public function testSimpleweekInputComponent()
    {
        $html = \Html::weekInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="week" />',
            $html
        );
    }

    public function testSimpleweekInputComponentForBootstrap3()
    {
        $this->setDecorators(['bootstrap:v3']);
        $html = \Html::weekInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="week" class="form-control" />',
            $html
        );
    }

    public function testComplexweekInputComponent()
    {
        $html = \Html::weekInput();
        $this->applyGeneralAttributes($html);
        $this->applyInputAttributes($html);
        $html
            ->max(12)
            ->min(12)
            ->step(2)
            ->generate();

        $this->assertHtmlEquals(
            '<input type="week" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" max="12" min="12" step="2" />',
            $html
        );
    }

}