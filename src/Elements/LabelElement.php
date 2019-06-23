<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsForAttribute;

/**
 * Class representing the HTML-element '<label></label>'
 *
 * Class LabelElement
 * @package Webflorist\HtmlFactory
 */
class LabelElement extends ContainerElement
{
    /**
     * Use corresponding traits for all element-specific HTML-attributes.
     */
    use AllowsForAttribute;

    /**
     * The name (=tag) of this element.
     *
     * @var string
     */
    protected $name = 'label';
}