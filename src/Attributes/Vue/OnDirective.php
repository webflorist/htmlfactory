<?php

namespace Nicat\HtmlFactory\Attributes\Vue;

use Nicat\HtmlFactory\Attributes\Abstracts\VueDirective;

/**
 * Class representing the Vue-Directive 'v-on'
 *
 * Class OnDirective
 * @package Nicat\HtmlFactory
 */
class OnDirective extends VueDirective
{

    public function getName(): string
    {
        return 'v-on';
    }

    protected function getAllowedModifiers()
    {

        // For events 'keydown', 'keypress', 'keyup', we accept all modifiers,
        // since they could be a keyCode or keyAlias.
        if (array_search($this->argument,['keydown', 'keypress', 'keyup'])) {
            return true;
        }

        return [
            'stop',
            'prevent',
            'capture',
            'self',
            'native',
            'once',
            'left',
            'right',
            'middle',
            'passive'
        ];
    }


}