<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'step'
 *
 * Class StepAttribute
 * @package Webflorist\HtmlFactory
 */
class StepAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'step';
    }
}