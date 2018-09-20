<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class SelectElementTest extends TestCase
{

    public function testSimpleSelectElement()
    {
        $html = \Html::select()
            ->generate();

        $this->assertHtmlEquals(
            '<select></select>',
            $html
        );
    }

    public function testSimpleSelectElementForBootstrap3()
    {
        $this->setDecorators(['bootstrap:v3']);
        $html = \Html::select()
            ->generate();

        $this->assertEquals(
            '<select class="form-control"></select>',
            $html
        );
    }

    public function testComplexSelectElement()
    {
        $html = \Html::select();
        $this->applyGeneralAttributes($html);
        $html
            ->ariaInvalid('true')
            ->autofocus(true)
            ->disabled(true)
            ->multiple()
            ->name('myFieldName')
            ->required(true)
            ->content("This is my select content")
            ->generate();

        $this->assertHtmlEquals(
            '<select aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled multiple name="myFieldName" required>This is my select content</select>',
            $html
        );
    }

}