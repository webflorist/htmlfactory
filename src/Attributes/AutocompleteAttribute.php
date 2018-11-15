<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'autocomplete'
 *
 * Class AutocompleteAttribute
 * @package Webflorist\HtmlFactory
 */
class AutocompleteAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'autocomplete';
    }

    protected function getAllowedValues() : array
    {
        return [
            'on',
            'off'
        ];
    }


}