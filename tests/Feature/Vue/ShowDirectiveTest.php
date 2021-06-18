<?php
namespace HtmlFactoryTests\Feature\Vue;

use HtmlFactoryTests\TestCase;

class ShowDirectiveTest extends TestCase
{

    public function test_show_directive()
    {
        $html = \Html::h1()
            ->vShow('ok')
            ->content('Hello!')
            ->generate();

        $this->assertHtmlEquals(
            '<h1 v-show="ok">Hello!</h1>',
            $html
        );
    }

}