<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class PreDirectiveTest extends TestCase
{

    public function test_pre_directive()
    {
        $html = \Html::span()
            ->vPre()
            ->content('{{ this will not be compiled }}')
            ->generate();

        $this->assertHtmlEquals(
            '<span v-pre>{{ this will not be compiled }}</span>',
            $html
        );
    }

}