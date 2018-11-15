<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\ListAttribute;

/**
 * Class representing the HTML-attribute 'style'
 *
 * Class StyleAttribute
 * @package Webflorist\HtmlFactory
 */
class StyleAttribute extends ListAttribute
{

    protected $divider = ';';

    public function getName(): string
    {
        return 'style';
    }
}