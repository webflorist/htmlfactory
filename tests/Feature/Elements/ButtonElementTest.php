<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class ButtonElementTest extends TestCase
{

    public function testSimpleButtonElement()
    {
        $html = \Html::button()
            ->generate();

        $this->assertHtmlEquals(
            '<button type="button"></button>',
            $html
        );
    }

    public function testSimpleButtonElementForBootstrap3()
    {
        $this->setFrontendFramework('bootstrap', '3');
        $html = \Html::button()
            ->generate();

        $this->assertHtmlEquals(
            '<button type="button" class="btn"></button>',
            $html
        );
    }

    public function testComplexButtonElement()
    {
        $html = \Html::button();
        $this->applyGeneralAttributes($html);
        $this->applyButtonAttributes($html);
        $html
            ->type('button')
            ->generate();

        $this->assertHtmlEquals(
            '<button type="button" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" autofocus disabled name="myButtonName" value="myValue">This is a button.</button>',
            $html
        );
    }

}