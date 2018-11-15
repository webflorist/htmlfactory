<?php

namespace Webflorist\HtmlFactory\Attributes\Vue;

use Webflorist\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-else'
 *
 * Class ElseDirective
 * @package Webflorist\HtmlFactory
 */
class ElseDirective extends VueDirective
{

    protected $expectsExpression = false;

    public function getDirectiveName(): string
    {
        return 'v-else';
    }

}