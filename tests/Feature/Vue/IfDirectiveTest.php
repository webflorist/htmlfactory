<?php
namespace HtmlFactoryTests\Feature\Vue;

use HtmlFactoryTests\TestCase;

class IfDirectiveTest extends TestCase
{

    public function test_if_directive()
    {
        $html = \Html::h1()
            ->vIf('ok')
            ->content('Yes')
            ->generate();

        $this->assertHtmlEquals(
            '<h1 v-if="ok">Yes</h1>',
            $html
        );
    }

    public function test_inline_statement()
    {
        $html = \Html::h1()
            ->vIf('Math.random() > 0.5')
            ->content('Now you see me')
            ->generate();

        $this->assertHtmlEquals(
            '<h1 v-if="Math.random() > 0.5">Now you see me</h1>',
            $html
        );
    }

}