<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'rows'
 *
 * Class RowsAttribute
 * @package Nicat\HtmlFactory
 */
class RowsAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'rows';
    }
}