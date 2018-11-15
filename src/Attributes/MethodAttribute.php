<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'method'
 *
 * Class MethodAttribute
 * @package Webflorist\HtmlFactory
 */
class MethodAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'method';
    }

    protected function getAllowedValues() : array
    {
        return [
            'GET',
            'POST'
        ];
    }


}