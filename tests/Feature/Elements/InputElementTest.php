<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;
use Webflorist\HtmlFactory\Elements\Abstracts\Element;
use Webflorist\HtmlFactory\Elements\InputElement;

class InputElementTest extends TestCase
{

    public function testSimpleInputElement()
    {
        $html = \Html::input()
            ->generate();

        $this->assertHtmlEquals(
            '<input />',
            $html
        );
    }

    public function testSimpleInputElementForBootstrap3()
    {
        $this->setDecorators(['bootstrap:v3']);
        $html = \Html::input()
            ->generate();

        $this->assertHtmlEquals(
            '<input class="form-control" />',
            $html
        );
    }

    public function testComplexInputElement()
    {
        $html = \Html::input();
        $this->applyGeneralAttributes($html);
        $this->applyInputAttributes($html);
        $html->generate();

        $this->assertHtmlEquals(
            '<input aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" />',
            $html
        );
    }

    public function testComplexInputElementUsingView()
    {
        $html = \Html::input();
        $this->applyGeneralAttributes($html);
        $this->applyInputAttributes($html);
        $this->applyCorrespondingView($html);
        $result = $html->generate();

        $this->assertHtmlEquals(
            'text before element <input aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" /> text after element',
            $result
        );
    }

    public function testComplexInputElementUsingViewWithDecorator()
    {
        $html = \Html::input();
        $this->applyGeneralAttributes($html);
        $this->applyInputAttributes($html);
        $this->applyCorrespondingView($html);
        $html->decorate(function(InputElement $element) {
            $element->id('myDecoratedId')
                ->addClass('myDecoratedClass')
                ->data('my-decorated-data-attribute','myDecoratedDataAttributeValue')
                ->addRole('myDecoratedRole')
                ->title('My Decorated Title')
                ->name('myDecoratedFieldName')
                ->value('myDecoratedValue')
                ->view('ElementsTestViews::decorated-input');
            ;
        });
        $result = $html->generate();

        $this->assertHtmlEquals(
            '
                decorated text before element
                <input id="myDecoratedId" aria-describedby="describedById" class="myFirstClass mySecondClass myDecoratedClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden role="myFirstRole mySecondRole myDecoratedRole" style="display:block;color:black" title="My Decorated Title" aria-invalid="true" autofocus disabled name="myDecoratedFieldName" readonly required value="myDecoratedValue" data-my-decorated-data-attribute="myDecoratedDataAttributeValue" />
                text after element
            ',
            $result
        );
    }

}