<?php

namespace Webflorist\HtmlFactory\Attributes\Vue;

use Webflorist\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-model'
 *
 * Class ModelDirective
 * @package Webflorist\HtmlFactory
 */
class ModelDirective extends VueDirective
{

    public function getDirectiveName(): string
    {
        return 'v-model';
    }

    protected function getAllowedModifiers()
    {
        return [
            'lazy',
            'number',
            'trim'
        ];
    }


}