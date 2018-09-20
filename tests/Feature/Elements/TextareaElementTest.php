<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class TextareaElementTest extends TestCase
{

    public function testSimpleTextareaElement()
    {
        $html = \Html::textarea()
            ->generate();

        $this->assertHtmlEquals(
            '<textarea></textarea>',
            $html
        );
    }

    public function testSimpleTextareaElementForBootstrap3()
    {
        $this->setDecorators(['bootstrap:v3']);
        $html = \Html::textarea()
            ->generate();

        $this->assertHtmlEquals(
            '<textarea class="form-control"></textarea>',
            $html
        );
    }

    public function testComplexTextareaElement()
    {
        $html = \Html::textarea();
        $this->applyGeneralAttributes($html);
        $html
            ->content("This is my textarea content")
            ->autofocus()
            ->disabled()
            ->maxlength(123)
            ->name('myFieldName')
            ->placeholder('My Placeholder')
            ->readonly()
            ->required()
            ->generate();

        $this->assertHtmlEquals(
            '<textarea role="myFirstRole mySecondRole" class="myFirstClass mySecondClass" id="myId" hidden data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" style="display:block;color:black" title="My Title" aria-describedby="describedById" autofocus disabled maxlength="123" name="myFieldName" placeholder="My Placeholder" readonly required>This is my textarea content</textarea>',
            $html
        );
    }

}