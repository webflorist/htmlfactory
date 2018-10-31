<?php

namespace Nicat\HtmlFactory\Attributes\Vue;

use Nicat\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-once'
 *
 * Class OnceDirective
 * @package Nicat\HtmlFactory
 */
class OnceDirective extends VueDirective
{

    protected $expectsExpression = false;

    public function getDirectiveName(): string
    {
        return 'v-once';
    }

}