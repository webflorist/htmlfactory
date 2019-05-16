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
     * The name (=tag) of this element.
     *
     * @var string
     */
    protected $name = 'blockquote';
}