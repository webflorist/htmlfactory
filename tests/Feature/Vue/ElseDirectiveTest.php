<?php
namespace HtmlFactoryTests\Feature\Elements;

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