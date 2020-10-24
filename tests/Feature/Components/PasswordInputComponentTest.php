<?php

namespace HtmlFactoryTests\Feature\Components;

use HtmlFactoryTests\TestCase;

class PasswordInputComponentTest extends TestCase
{

    public function testSimplePasswordInputComponent()
    {
        $html = \Html::passwordInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="password" />',
            $html
        );
    }

    public function testSimplePasswordInputComponentForBootstrap3()
    {
        $this->setDecorators(['bootstrap:v3']);
        $html = \Html::passwordInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="password" class="form-control" />',
            $html
        );
    }

    public function testComplexPasswordInputComponent()
    {
        $html = \Html::passwordInput();
        $this->applyGeneralAttributes($html);
        $this->applyInputAttributes($html);
        $html
            ->maxlength(12)
            ->pattern('[A-Za-z]{3}')
            ->placeholder('My Placeholder')
            ->size(12)
            ->generate();

        $this->assertHtmlEquals(
            '<input type="password" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" maxlength="12" pattern="[A-Za-z]{3}" placeholder="My Placeholder" size="12" />',
            $html
        );
    }

}