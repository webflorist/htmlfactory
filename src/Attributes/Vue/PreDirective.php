<?php

namespace Nicat\HtmlFactory\Attributes\Vue;

use Nicat\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-pre'
 *
 * Class PreDirective
 * @package Nicat\HtmlFactory
 */
class PreDirective extends VueDirective
{

    protected $expectsExpression = false;

    public function getDirectiveName(): string
    {
        return 'v-pre';
    }

}