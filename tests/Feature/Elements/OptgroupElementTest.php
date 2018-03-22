<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class OptgroupElementTest extends TestCase
{

    public function testSimpleOptgroupElement()
    {
        $html = \Html::optgroup()
            ->generate();

        $this->assertHtmlEquals(
            '<optgroup></optgroup>',
            $html
        );
    }

    public function testComplexOptgroupElement()
    {
        $html = \Html::optgroup();
        $this->applyGeneralAttributes($html);
        $html
            ->label('myLabel')
            ->generate();

        $this->assertHtmlEquals(
            '<optgroup label="myLabel" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title"></optgroup>',
            $html
        );
    }

}