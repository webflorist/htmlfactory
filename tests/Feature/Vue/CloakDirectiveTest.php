<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class CloakDirectiveTest extends TestCase
{

    public function test_cloak_directive()
    {
        $html = \Html::div()
            ->vCloak()
            ->content('{{ message }}')
            ->generate();

        $this->assertHtmlEquals(
            '<div v-cloak>{{ message }}</div>',
            $html
        );
    }

}