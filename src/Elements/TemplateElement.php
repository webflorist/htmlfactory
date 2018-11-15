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
     * Returns the name of the element.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'template';
    }
}