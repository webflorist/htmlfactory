<?php

namespace Webflorist\HtmlFactory\Elements;

use Webflorist\HtmlFactory\Elements\Abstracts\ContainerElement;

/**
 * Class representing the HTML-element '<fieldset></fieldset>'
 *
 * Class FieldsetElement
 * @package Webflorist\HtmlFactory
 */
class FieldsetElement extends ContainerElement
{

    /**
     * Returns the name of the element.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'fieldset';
    }

}