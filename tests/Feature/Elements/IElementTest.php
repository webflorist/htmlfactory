<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class IElementTest extends TestCase
{

    public function testSimpleIElement()
    {
        $html = \Html::i()
            ->generate();

        $this->assertHtmlEquals(
            '<i></i>',
            $html
        );
    }

    public function testComplexIElement()
    {
        $html = \Html::i();
        $this->applyGeneralAttributes($html);
        $html->generate();

        $this->assertHtmlEquals(
            '<i aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title"></i>',
            $html
        );
    }

}