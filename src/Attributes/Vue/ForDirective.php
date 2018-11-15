<?php

namespace Webflorist\HtmlFactory\Attributes\Vue;

use Webflorist\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-for'
 *
 * Class ForDirective
 * @package Webflorist\HtmlFactory
 */
class ForDirective extends VueDirective
{

    public function getDirectiveName(): string
    {
        return 'v-for';
    }

}