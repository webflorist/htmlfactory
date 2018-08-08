<?php

namespace Nicat\HtmlFactory\Attributes\Vue;

use Nicat\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-bind'
 *
 * Class BindDirective
 * @package Nicat\HtmlFactory
 */
class BindDirective extends VueDirective
{

    public function getName(): string
    {
        return 'v-bind';
    }

    protected function getAllowedModifiers()
    {
        return [
            'prop',
            'camel',
            'sync'
        ];
    }


}