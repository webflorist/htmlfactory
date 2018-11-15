<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'rows'
 *
 * Class RowsAttribute
 * @package Webflorist\HtmlFactory
 */
class RowsAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'rows';
    }
}