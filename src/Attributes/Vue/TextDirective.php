<?php

namespace Webflorist\HtmlFactory\Attributes\Vue;

use Webflorist\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-text'
 *
 * Class TextDirective
 * @package Webflorist\HtmlFactory
 */
class TextDirective extends VueDirective
{

    public function getDirectiveName(): string
    {
        return 'v-text';
    }

}