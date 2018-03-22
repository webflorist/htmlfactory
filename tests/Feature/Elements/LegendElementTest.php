<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class LegendElementTest extends TestCase
{

    public function testSimpleLegendElement()
    {
        $html = \Html::legend()
            ->generate();

        $this->assertHtmlEquals(
            '<legend></legend>',
            $html
        );
    }

    public function testComplexLegendElement()
    {
        $html = \Html::legend();
        $this->applyGeneralAttributes($html);
        $html->generate();

        $this->assertHtmlEquals(
            '<legend aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title"></legend>',
            $html
        );
    }

}