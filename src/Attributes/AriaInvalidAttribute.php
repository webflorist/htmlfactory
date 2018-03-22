<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'aria-invalid'
 *
 * Class AriaDescribedbyAttribute
 * @package Nicat\HtmlFactory
 */
class AriaInvalidAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'aria-invalid';
    }

    protected function getAllowedValues() : array
    {
        return [
            'false',
            'grammar',
            'spelling',
            'true'
        ];
    }
}