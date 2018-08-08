<?php

namespace Nicat\HtmlFactory\Attributes\Vue;

use Nicat\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-for'
 *
 * Class ForDirective
 * @package Nicat\HtmlFactory
 */
class ForDirective extends VueDirective
{

    public function getName(): string
    {
        return 'v-for';
    }

}