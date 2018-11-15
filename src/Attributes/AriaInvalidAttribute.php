<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'aria-invalid'
 *
 * Class AriaDescribedbyAttribute
 * @package Webflorist\HtmlFactory
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