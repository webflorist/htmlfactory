<?php
namespace HtmlFactoryTests\Feature\Vue;

use HtmlFactoryTests\TestCase;

class ModelDirectiveTest extends TestCase
{

    public function test_simple_model()
    {
        $html = \Html::input()
            ->vModel('my-key')
            ->generate();

        $this->assertHtmlEquals(
            '<input v-model="my-key" \>',
            $html
        );
    }


    public function test_model_with_modifiers()
    {
        $html = \Html::input()
            ->vModel('my-key', ['lazy','number'])
            ->generate();

        $this->assertHtmlEquals(
            '<input v-model.lazy.number="my-key" \>',
            $html
        );
    }
}