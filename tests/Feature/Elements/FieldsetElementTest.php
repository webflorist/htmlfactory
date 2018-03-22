<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class FieldsetElementTest extends TestCase
{

    public function testSimpleFieldsetElement()
    {
        $html = \Html::fieldset()
            ->generate();

        $this->assertHtmlEquals(
            '<fieldset></fieldset>',
            $html
        );
    }

    public function testSimpleFieldsetElementForBootstrap3()
    {
        $this->setFrontendFramework('bootstrap', '3');
        $html = \Html::fieldset()
            ->generate();

        $this->assertHtmlEquals(
            '<fieldset class="form-group"></fieldset>',
            $html
        );
    }

    public function testComplexFieldsetElement()
    {
        $html = \Html::fieldset();
        $this->applyGeneralAttributes($html);
        $html
            ->legend('MyLegend')
            ->generate();

        $this->assertHtmlEquals(
            '<fieldset aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title"><legend>MyLegend</legend></fieldset>',
            $html
        );
    }

}