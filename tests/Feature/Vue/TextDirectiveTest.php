<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class TextDirectiveTest extends TestCase
{

    public function test_text_directive()
    {
        $html = \Html::span()
            ->vText('msg')
            ->generate();

        $this->assertHtmlEquals(
            '<span v-text="msg"></span>',
            $html
        );
    }

}