<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'enctype'
 *
 * Class EnctypeAttribute
 * @package Webflorist\HtmlFactory
 */
class EnctypeAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'enctype';
    }

    protected function getAllowedValues() : array
    {
        return [
            'application/x-www-form-urlencoded',
            'multipart/form-data',
            'text/plain'
        ];
    }


}