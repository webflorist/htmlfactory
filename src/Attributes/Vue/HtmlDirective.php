<?php

namespace Nicat\HtmlFactory\Attributes\Vue;

use Nicat\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-html'
 *
 * Class HtmlDirective
 * @package Nicat\HtmlFactory
 */
class HtmlDirective extends VueDirective
{

    public function getName(): string
    {
        return 'v-html';
    }

}