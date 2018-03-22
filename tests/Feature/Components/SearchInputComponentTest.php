<?php

namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;

class SearchInputComponentTest extends TestCase
{

    public function testSimpleSearchInputComponent()
    {
        $html = \Html::searchInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="search" />',
            $html
        );
    }

    public function testSimpleSearchInputComponentForBootstrap3()
    {
        $this->setFrontendFramework('bootstrap', '3');
        $html = \Html::searchInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="search" class="form-control" />',
            $html
        );
    }

    public function testComplexSearchInputComponent()
    {
        $html = \Html::searchInput();
        $this->applyGeneralAttributes($html);
        $this->applyInputAttributes($html);
        $html
            ->autocomplete(true)
            ->maxlength(12)
            ->pattern('[A-Za-z]{3}')
            ->placeholder('My Placeholder')
            ->size(12)
            ->generate();

        $this->assertHtmlEquals(
            '<input type="search" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" autocomplete="on" maxlength="12" pattern="[A-Za-z]{3}" placeholder="My Placeholder" size="12" />',
            $html
        );
    }

}