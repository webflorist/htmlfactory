<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;
use Nicat\HtmlFactory\Exceptions\VueDirectiveModifierNotAllowedException;

class OnDirectiveTest extends TestCase
{

    public function test_method_handler()
    {
        $html = \Html::button()
            ->vOn('click', 'doThis')
            ->generate();

        $this->assertHtmlEquals(
            '<button type="button" v-on:click="doThis"></button>',
            $html
        );
    }

    public function test_inline_statement()
    {
        $html = \Html::button()
            ->vOn('click', "doThat('hello', \$event)")
            ->generate();

        $this->assertHtmlEquals(
            '<button type="button" v-on:click="doThat(\'hello\', $event)"></button>',
            $html
        );
    }

    public function test_chained_modifiers()
    {
        $html = \Html::button()
            ->vOn('click', "doThis", ['stop', 'prevent'])
            ->generate();

        $this->assertHtmlEquals(
            '<button type="button" v-on:click.stop.prevent="doThis"></button>',
            $html
        );
    }

    public function test_invalid_modifier()
    {
        $this->expectException(VueDirectiveModifierNotAllowedException::class);
        $html = \Html::button()
            ->vOn('click', "doThis", ['i_am_an_invalid_modifier'])
            ->generate();

        $this->assertHtmlEquals(
            '<button type="button" v-on:click.stop.prevent="doThis"></button>',
            $html
        );
    }

    public function test_key_modifier()
    {
        $html = \Html::button()
            ->vOn('keyup', "onEnter", ['enter'])
            ->generate();

        $this->assertHtmlEquals(
            '<button type="button" v-on:keyup.enter="onEnter"></button>',
            $html
        );
    }

    public function test_object_syntax()
    {
        $html = \Html::button()
            ->vOn(null, '{ mousedown: doThis, mouseup: doThat }')
            ->generate();

        $this->assertHtmlEquals(
            '<button type="button" v-on="{ mousedown: doThis, mouseup: doThat }"></button>',
            $html
        );
    }

    public function test_on_click_shortcut()
    {
        $html = \Html::button()
            ->vOnClick('doThis')
            ->generate();

        $this->assertHtmlEquals(
            '<button type="button" v-on:click="doThis"></button>',
            $html
        );
    }

    public function test_on_change_shortcut()
    {
        $html = \Html::button()
            ->vOnChange('doThis')
            ->generate();

        $this->assertHtmlEquals(
            '<button type="button" v-on:change="doThis"></button>',
            $html
        );
    }

    public function test_on_mouseover_shortcut()
    {
        $html = \Html::button()
            ->vOnMouseOver('doThis')
            ->generate();

        $this->assertHtmlEquals(
            '<button type="button" v-on:mouseover="doThis"></button>',
            $html
        );
    }

    public function test_on_mouseout_shortcut()
    {
        $html = \Html::button()
            ->vOnMouseOut('doThis')
            ->generate();

        $this->assertHtmlEquals(
            '<button type="button" v-on:mouseout="doThis"></button>',
            $html
        );
    }

    public function test_on_keydown_shortcut()
    {
        $html = \Html::button()
            ->vOnKeyDown('doThis')
            ->generate();

        $this->assertHtmlEquals(
            '<button type="button" v-on:keydown="doThis"></button>',
            $html
        );
    }

    public function test_on_keyup_shortcut()
    {
        $html = \Html::button()
            ->vOnKeyUp('doThis')
            ->generate();

        $this->assertHtmlEquals(
            '<button type="button" v-on:keyup="doThis"></button>',
            $html
        );
    }

    public function test_on_load_shortcut()
    {
        $html = \Html::button()
            ->vOnLoad('doThis')
            ->generate();

        $this->assertHtmlEquals(
            '<button type="button" v-on:load="doThis"></button>',
            $html
        );
    }

}