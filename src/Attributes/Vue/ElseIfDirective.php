<?php

namespace Webflorist\HtmlFactory\Attributes\Vue;

use Webflorist\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-else-if'
 *
 * Class ElseIfDirective
 * @package Webflorist\HtmlFactory
 */
class ElseIfDirective extends VueDirective
{

    public function getDirectiveName(): string
    {
        return 'v-else-if';
    }

}