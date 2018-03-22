<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\ListAttribute;

/**
 * Class representing the HTML-attribute 'style'
 *
 * Class StyleAttribute
 * @package Nicat\HtmlFactory
 */
class StyleAttribute extends ListAttribute
{

    protected $divider = ';';

    public function getName(): string
    {
        return 'style';
    }
}