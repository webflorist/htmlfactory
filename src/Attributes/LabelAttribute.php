<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'label'
 *
 * Class ForAttribute
 * @package Webflorist\HtmlFactory
 */
class LabelAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'label';
    }
}