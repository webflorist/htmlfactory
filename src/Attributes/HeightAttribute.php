<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'height'
 *
 * Class HeightAttribute
 * @package Nicat\HtmlFactory
 */
class HeightAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'height';
    }
}