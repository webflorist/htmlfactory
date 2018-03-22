<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class SpanElementTest extends TestCase
{

    public function testSimpleSpanElement()
    {
        $html = \Html::span()
            ->generate();

        $this->assertHtmlEquals(
            '<span></span>',
            $html
        );
    }

    public function testComplexSpanElement()
    {
        $html = \Html::span();
        $this->applyGeneralAttributes($html);
        $html
            ->content("This is my first text-only content")
            ->content(\Html::br())
            ->content("This is my second text-only content")
            ->generate();

        $this->assertHtmlEquals(
            '<span role="myFirstRole mySecondRole" class="myFirstClass mySecondClass" id="myId" hidden data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" style="display:block;color:black" title="My Title" aria-describedby="describedById">This is my first text-only content<br />This is my second text-only content</span>',
            $html
        );
    }

}