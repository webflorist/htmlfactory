<?php

namespace Webflorist\HtmlFactory\Attributes;

use Webflorist\HtmlFactory\Attributes\Abstracts\StringAttribute;

/**
 * Class representing the HTML-attribute 'target'
 *
 * Class TargetAttribute
 * @package Webflorist\HtmlFactory
 */
class TargetAttribute extends StringAttribute
{

    public function getName(): string
    {
        return 'target';
    }


}