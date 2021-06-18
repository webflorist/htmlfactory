<?php
namespace HtmlFactoryTests\Feature\Vue;

use HtmlFactoryTests\TestCase;

class ElseDirectiveTest extends TestCase
{

    public function test_else_directive()
    {
        $html = \Html::div()
            ->vElse()
            ->content('Content')
            ->generate();

        $this->assertHtmlEquals(
            '<div v-else>Content</div>',
            $html
        );
    }

}