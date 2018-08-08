<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class HtmlDirectiveTest extends TestCase
{

    public function test_tml_directive()
    {
        $html = \Html::div()
            ->vHtml('html')
            ->generate();

        $this->assertHtmlEquals(
            '<div v-html="html"></div>',
            $html
        );
    }

}