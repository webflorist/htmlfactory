<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class CustomDirectiveTest extends TestCase
{

    public function test_custom_directive()
    {
        $html = \Html::div()
            ->vCustom('demo', 'foo', 'message',['a','b'])
            ->content('{{ message }}')
            ->generate();

        $this->assertHtmlEquals(
            '<div v-demo:foo.a.b="message">{{ message }}</div>',
            $html
        );
    }

}