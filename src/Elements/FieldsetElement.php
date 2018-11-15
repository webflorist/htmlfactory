<?php

namespace Nicat\HtmlFactory\Elements;

use Nicat\HtmlFactory\Elements\Abstracts\ContainerElement;

/**
 * Class representing the HTML-element '<fieldset></fieldset>'
 *
 * Class FieldsetElement
 * @package Nicat\HtmlFactory
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