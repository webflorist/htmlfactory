<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class ElseIfDirectiveTest extends TestCase
{

    public function test_else_if_directive()
    {
        $html = \Html::div()
            ->vElseIf("type === 'B'")
            ->content('B')
            ->generate();

        $this->assertHtmlEquals(
            '<div v-else-if="type === \'B\'">B</div>',
            $html
        );
    }

}