<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'src'
 *
 * Class SrcAttribute
 * @package Nicat\HtmlFactory
 */
class SrcAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'src';
    }
}