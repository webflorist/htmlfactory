<?php

namespace Nicat\HtmlFactory\Attributes\Vue;

use Nicat\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-else'
 *
 * Class ElseDirective
 * @package Nicat\HtmlFactory
 */
class ElseDirective extends VueDirective
{

    protected $expectsExpression = false;

    public function getName(): string
    {
        return 'v-else';
    }

}