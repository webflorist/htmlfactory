<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class SupElementTest extends TestCase
{

    public function testSimpleSupElement()
    {
        $html = \Html::sup()
            ->generate();

        $this->assertHtmlEquals(
            '<sup></sup>',
            $html
        );
    }

    public function testComplexSupElement()
    {
        $html = \Html::sup();
        $this->applyGeneralAttributes($html);
        $html
            ->content("This is my first text-only content")
            ->content(\Html::br())
            ->content("This is my second text-only content")
            ->generate();

        $this->assertHtmlEquals(
            '<sup role="myFirstRole mySecondRole" class="myFirstClass mySecondClass" id="myId" hidden data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" style="display:block;color:black" title="My Title" aria-describedby="describedById">This is my first text-only content<br />This is my second text-only content</sup>',
            $html
        );
    }

}