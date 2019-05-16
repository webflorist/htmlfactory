<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsLabelAttribute;

/**
 * Class representing the HTML-element '<optgroup></optgroup>'.
 *
 * Class OptgroupElement
 * @package Webflorist\HtmlFactory
 */
class OptgroupElement extends ContainerElement
{

    /**
     * Use corresponding traits for all element-specific HTML-attributes.
     */
    use AllowsLabelAttribute;

    /**
     * The name (=tag) of this element.
     *
     * @var string
     */
    protected $name = 'optgroup';
}