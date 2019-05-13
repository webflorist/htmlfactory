<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsCiteAttribute;

/**
 * Class representing the HTML-element '<blockquote></blockquote>'
 *
 * Class BlockquoteElement
 * @package Webflorist\HtmlFactory
 */
class BlockquoteElement extends ContainerElement
{
    /**
     * Use corresponding traits for all element-specific HTML-attributes.
     */
    use AllowsCiteAttribute;

    /**
     * Returns the name of the element.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'blockquote';
    }
}