<?php
namespace HtmlFactoryTests\Feature\Elements;

use HtmlFactoryTests\TestCase;
use Webflorist\HtmlFactory\Payload\Abstracts\Payload;

class AElementTest extends TestCase
{

    public function testSimpleAElement()
    {
        $html = \Html::a()
            ->generate();

        $this->assertHtmlEquals(
            '<a></a>',
            $html
        );
    }

    public function testComplexAElement()
    {
        $html = \Html::a();
        $this->applyGeneralAttributes($html);
        $html->download();
        $html->href('http://example.com');
        $html->targetBlank();
        $html->rel('nofollow');
        $html->generate();

        $this->assertHtmlEquals(
            '<a id="myId" aria-describedby="describedById" class="myFirstClass mySecondClass" data-my-first-data-attribute="myFirstDataAttributeValue" data-my-second-data-attribute="mySecondDataAttributeValue" hidden role="myFirstRole mySecondRole" style="display:block;color:black" title="My Title" download="1" href="http://example.com" target="_blank" rel="nofollow"></a>',
            $html
        );
    }

}