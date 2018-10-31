<?php

namespace Nicat\HtmlFactory\Attributes\Vue;

use Nicat\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-model'
 *
 * Class ModelDirective
 * @package Nicat\HtmlFactory
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