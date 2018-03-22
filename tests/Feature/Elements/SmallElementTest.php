<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class SmallElementTest extends TestCase
{

    public function testSimpleSmallElement()
    {
        $html = \Html::small()
            ->generate();

        $this->assertHtmlEquals(
            '<small></small>',
            $html
        );
    }

    public function testComplexSmallElement()
    {
        $html = \Html::small();
        $this->applyGeneralAttributes($html);
        $html
            ->content("This is my first text-only content")
            ->content(\Html::br())
            ->content("This is my second text-only content")
            ->generate();

        $this->assertHtmlEquals(
            '<small role="myFirstRole mySecondRole" class="myFirstClass mySecondClass" id="myId" hidden data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" style="display:block;color:black" title="My Title" aria-describedby="describedById">This is my first text-only content<br />This is my second text-only content</small>',
            $html
        );
    }

}