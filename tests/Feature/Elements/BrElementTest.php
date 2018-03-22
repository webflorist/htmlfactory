<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class BrElementTest extends TestCase
{

    public function testSimpleBrElement()
    {
        $html = \Html::br()
            ->generate();

        $this->assertHtmlEquals(
            '<br />',
            $html
        );
    }

    public function testComplexBrElement()
    {
        $html = \Html::br();
        $this->applyGeneralAttributes($html);
        $html->generate();

        $this->assertHtmlEquals(
            '<br aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" />',
            $html
        );
    }

}