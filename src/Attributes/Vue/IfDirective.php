<?php

namespace Nicat\HtmlFactory\Attributes\Vue;

use Nicat\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-if'
 *
 * Class IfDirective
 * @package Nicat\HtmlFactory
 */
class IfDirective extends VueDirective
{

    public function getName(): string
    {
        return 'v-if';
    }

}