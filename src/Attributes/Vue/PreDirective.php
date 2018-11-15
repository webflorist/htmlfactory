<?php

namespace Webflorist\HtmlFactory\Attributes\Vue;

use Webflorist\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-pre'
 *
 * Class PreDirective
 * @package Webflorist\HtmlFactory
 */
class PreDirective extends VueDirective
{

    protected $expectsExpression = false;

    public function getDirectiveName(): string
    {
        return 'v-pre';
    }

}