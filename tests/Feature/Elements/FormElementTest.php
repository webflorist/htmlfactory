<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class FormElementTest extends TestCase
{

    public function testSimpleFormElement()
    {
        $html = \Html::form()
            ->generate();

        $this->assertHtmlEquals(
            '<form></form>',
            $html
        );
    }

    public function testSimpleFormElementForBootstrap3()
    {
        $this->setFrontendFramework('bootstrap', '3');
        $html = \Html::form()
            ->generate();

        $this->assertHtmlEquals(
            '<form class="form-vertical"></form>',
            $html
        );
    }

    public function testComplexFormElement()
    {
        $html = \Html::form();
        $this->applyGeneralAttributes($html);
        $html
            ->content("This is my first text-only content")
            ->content(\Html::br())
            ->content("This is my second text-only content")
            ->acceptCharset('UTF-8')
            ->action('index.php')
            ->autocomplete(true)
            ->enctype('multipart/form-data')
            ->method('get')
            ->novalidate()
            ->target('_blank')
            ->generate();

        $this->assertHtmlEquals(
            '<form role="myFirstRole mySecondRole" class="myFirstClass mySecondClass" id="myId" hidden data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" style="display:block;color:black" title="My Title" aria-describedby="describedById" accept-charset="UTF-8" action="index.php" autocomplete="on" enctype="multipart/form-data" method="GET" novalidate target="_blank">This is my first text-only content<br />This is my second text-only content</form>',
            $html
        );
    }

}