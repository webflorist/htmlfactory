<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'label'
 *
 * Class ForAttribute
 * @package Nicat\HtmlFactory
 */
class LabelAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'label';
    }
}