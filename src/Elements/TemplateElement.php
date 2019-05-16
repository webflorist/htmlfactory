<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;

/**
 * Class representing the HTML-element '<template></template>'
 *
 * Class TemplateElement
 * @package Webflorist\HtmlFactory
 */
class TemplateElement extends ContainerElement
{
    /**
     * The name (=tag) of this element.
     *
     * @var string
     */
    protected $name = 'template';
}