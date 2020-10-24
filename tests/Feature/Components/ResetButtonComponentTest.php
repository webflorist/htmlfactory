<?php
namespace HtmlFactoryTests\Feature\Components;

use HtmlFactoryTests\TestCase;

class ResetButtonComponentTest extends TestCase
{

    public function testSimpleResetButtonComponent()
    {
        $html = \Html::resetButton()
            ->generate();

        $this->assertHtmlEquals(
            '<button type="reset"></button>',
            $html
        );
    }

    public function testSimpleResetButtonComponentForBootstrap3()
    {
        $this->setDecorators(['bootstrap:v3']);
        $html = \Html::resetButton()
            ->generate();

        $this->assertHtmlEquals(
            '<button type="reset" class="btn"></button>',
            $html
        );
    }

    public function testComplexResetButtonComponent()
    {
        $html = \Html::resetButton();
        $this->applyGeneralAttributes($html);
        $this->applyButtonAttributes($html);
        $html->generate();

        $this->assertHtmlEquals(
            '<button type="reset" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" autofocus disabled name="myButtonName" value="myValue">This is a button.</button>',
            $html
        );
    }

}