<?php

namespace Webflorist\HtmlFactory\Attributes\Vue;

use Webflorist\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-if'
 *
 * Class IfDirective
 * @package Webflorist\HtmlFactory
 */
class IfDirective extends VueDirective
{

    public function getDirectiveName(): string
    {
        return 'v-if';
    }

}