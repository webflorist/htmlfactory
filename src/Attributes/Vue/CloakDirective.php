<?php

namespace Nicat\HtmlFactory\Attributes\Vue;

use Nicat\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-cloak'
 *
 * Class CloakDirective
 * @package Nicat\HtmlFactory
 */
class CloakDirective extends VueDirective
{

    protected $expectsExpression = false;

    public function getDirectiveName(): string
    {
        return 'v-cloak';
    }

}