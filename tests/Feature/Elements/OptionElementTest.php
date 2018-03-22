<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class OptionElementTest extends TestCase
{

    public function testSimpleOptionElement()
    {
        $html = \Html::option()
            ->generate();

        $this->assertHtmlEquals(
            '<option></option>',
            $html
        );
    }

    public function testComplexOptionElement()
    {
        $html = \Html::option();
        $this->applyGeneralAttributes($html);
        $html
            ->disabled(true)
            ->selected(true)
            ->value('myValue')
            ->generate();

        $this->assertHtmlEquals(
            '<option aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" disabled selected value="myValue"></option>',
            $html
        );
    }

}