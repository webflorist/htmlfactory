<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;
use Webflorist\HtmlFactory\Exceptions\VueDirectiveModifierNotAllowedException;

class BindDirectiveTest extends TestCase
{

    public function test_attribute_binding()
    {
        $html = \Html::img()
            ->vBind('src', 'imageSrc')
            ->vBind('id', 'imageId')
            ->generate();

        $this->assertHtmlEquals(
            '<img v-bind:src="imageSrc" v-bind:id="imageId" \>',
            $html
        );
    }

    public function test_multiple_classes_binding()
    {
        $html = \Html::div()
            ->vBind('class', '[classA, { classB: isB, classC: isC }]')
            ->generate();

        $this->assertHtmlEquals(
            '<div v-bind:class="[classA, { classB: isB, classC: isC }]" ></div>',
            $html
        );
    }

    public function test_binding_with_prop_modifier()
    {
        $html = \Html::div()
            ->vBind('text-content', 'text', ['prop'])
            ->generate();

        $this->assertHtmlEquals(
            '<div v-bind:text-content.prop="text"></div>',
            $html
        );
    }

}