<?php

namespace Nicat\HtmlFactory\Attributes\Vue;

use Nicat\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-show'
 *
 * Class ShowDirective
 * @package Nicat\HtmlFactory
 */
class ShowDirective extends VueDirective
{

    public function getName(): string
    {
        return 'v-show';
    }

}