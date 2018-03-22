<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class LabelElementTest extends TestCase
{

    public function testSimpleLabelElement()
    {
        $html = \Html::label()
            ->generate();

        $this->assertHtmlEquals(
            '<label></label>',
            $html
        );
    }

    public function testSimpleLabelElementForBootstrap3()
    {
        $this->setFrontendFramework('bootstrap', '3');
        $html = \Html::label()
            ->generate();

        $this->assertHtmlEquals(
            '<label></label>',
            $html
        );
    }

    public function testComplexLabelElement()
    {
        $html = \Html::label();
        $this->applyGeneralAttributes($html);
        $html
            ->for('forId')
            ->generate();

        $this->assertHtmlEquals(
            '<label aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" for="forId"></label>',
            $html
        );
    }

}