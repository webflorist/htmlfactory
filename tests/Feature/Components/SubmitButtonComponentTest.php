<?php
namespace HtmlFactoryTests\Feature\Components;

use HtmlFactoryTests\TestCase;

class SubmitButtonComponentTest extends TestCase
{

    public function testSimpleSubmitButtonComponent()
    {
        $html = \Html::submitButton()
            ->generate();

        $this->assertHtmlEquals(
            '<button type="submit"></button>',
            $html
        );
    }

    public function testSimpleSubmitButtonComponentForBootstrap3()
    {
        $this->setFrontendFramework('bootstrap', '3');
        $html = \Html::submitButton()
            ->generate();

        $this->assertHtmlEquals(
            '<button type="submit" class="btn"></button>',
            $html
        );
    }

    public function testComplexSubmitButtonComponent()
    {
        $html = \Html::submitButton();
        $this->applyGeneralAttributes($html);
        $this->applyButtonAttributes($html);
        $html->generate();

        $this->assertHtmlEquals(
            '<button type="submit" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" autofocus disabled name="myButtonName" value="myValue">This is a button.</button>',
            $html
        );
    }

}