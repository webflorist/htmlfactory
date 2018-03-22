<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'autocomplete'
 *
 * Class AutocompleteAttribute
 * @package Nicat\HtmlFactory
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