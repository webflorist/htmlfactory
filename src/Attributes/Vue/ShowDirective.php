<?php

namespace Webflorist\HtmlFactory\Attributes\Vue;

use Webflorist\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-show'
 *
 * Class ShowDirective
 * @package Webflorist\HtmlFactory
 */
class ShowDirective extends VueDirective
{

    public function getDirectiveName(): string
    {
        return 'v-show';
    }

}