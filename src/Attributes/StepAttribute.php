<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'step'
 *
 * Class StepAttribute
 * @package Nicat\HtmlFactory
 */
class StepAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'step';
    }
}