<?php
namespace HtmlFactoryTests\Feature\Vue;

use HtmlFactoryTests\TestCase;

class OnceDirectiveTest extends TestCase
{

    public function test_once_directive()
    {
        $html = \Html::span()
            ->vOnce()
            ->content('This will never change: {{msg}}')
            ->generate();

        $this->assertHtmlEquals(
            '<span v-once>This will never change: {{msg}}</span>',
            $html
        );
    }

    public function test_once_directive_with_children()
    {
        $html = \Html::div()
            ->vOnce()
            ->content([
                \Html::h1()->content('comment'),
                \Html::p()->content('{{msg}}')
            ])
            ->generate();

        $this->assertHtmlEquals(
            '<div v-once><h1>comment</h1><p>{{msg}}</p></div>',
            $html
        );
    }

}