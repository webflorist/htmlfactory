<?php

namespace Nicat\HtmlFactory\Attributes;

use Nicat\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'target'
 *
 * Class TargetAttribute
 * @package Nicat\HtmlFactory
 */
class TargetAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'target';
    }


}