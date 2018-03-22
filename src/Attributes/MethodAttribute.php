<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'method'
 *
 * Class MethodAttribute
 * @package Nicat\HtmlFactory
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