<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class ForDirectiveTest extends TestCase
{

    public function test_if_directive()
    {
        $html = \Html::div()
            ->vFor('item in items')
            ->content('{{ item.text }}')
            ->generate();

        $this->assertHtmlEquals(
            '<div v-for="item in items">{{ item.text }}</div>',
            $html
        );
    }

}