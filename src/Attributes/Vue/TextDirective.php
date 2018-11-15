<?php

namespace Nicat\HtmlFactory\Attributes\Vue;

use Nicat\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-text'
 *
 * Class TextDirective
 * @package Nicat\HtmlFactory
 */
class TextDirective extends VueDirective
{

    public function getDirectiveName(): string
    {
        return 'v-text';
    }

}