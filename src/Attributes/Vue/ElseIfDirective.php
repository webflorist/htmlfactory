<?php

namespace Nicat\HtmlFactory\Attributes\Vue;

use Nicat\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-else-if'
 *
 * Class ElseIfDirective
 * @package Nicat\HtmlFactory
 */
class ElseIfDirective extends VueDirective
{

    public function getDirectiveName(): string
    {
        return 'v-else-if';
    }

}