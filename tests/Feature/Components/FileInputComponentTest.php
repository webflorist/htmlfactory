<?php

namespace HtmlFactoryTests\Feature\Components;

use HtmlFactoryTests\TestCase;

class FileInputComponentTest extends TestCase
{

    public function testSimpleFileInputComponent()
    {
        $html = \Html::fileInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="file" />',
            $html
        );
    }

    public function testSimpleFileInputComponentForBootstrap3()
    {
        $this->setFrontendFramework('bootstrap', '3');
        $html = \Html::fileInput()
            ->generate();

        $this->assertHtmlEquals(
            '<input type="file" class="form-control-file" />',
            $html
        );
    }

    public function testComplexFileInputComponent()
    {
        $html = \Html::fileInput();
        $this->applyGeneralAttributes($html);
        $this->applyInputAttributes($html);
        $html
            ->accept('pdf')
            ->multiple(true)
            ->generate();

        $this->assertHtmlEquals(
            '<input type="file" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden id="myId" role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" aria-invalid="true" autofocus disabled name="myFieldName" readonly required value="myValue" accept="pdf" multiple />',
            $html
        );
    }

}