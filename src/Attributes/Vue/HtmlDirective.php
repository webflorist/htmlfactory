<?php

namespace Webflorist\HtmlFactory\Attributes\Vue;

use Webflorist\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-html'
 *
 * Class HtmlDirective
 * @package Webflorist\HtmlFactory
 */
class HtmlDirective extends VueDirective
{

    public function getDirectiveName(): string
    {
        return 'v-html';
    }

}