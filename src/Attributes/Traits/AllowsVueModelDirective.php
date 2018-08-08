<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\Vue\BindDirective;
use Nicat\HtmlFactory\Attributes\Vue\ElseDirective;
use Nicat\HtmlFactory\Attributes\Vue\ElseIfDirective;
use Nicat\HtmlFactory\Attributes\Vue\HtmlDirective;
use Nicat\HtmlFactory\Attributes\Vue\IfDirective;
use Nicat\HtmlFactory\Attributes\Vue\ModelDirective;
use Nicat\HtmlFactory\Attributes\Vue\OnDirective;
use Nicat\HtmlFactory\Attributes\Vue\ShowDirective;
use Nicat\HtmlFactory\Attributes\Vue\TextDirective;

trait AllowsVueModelDirective
{

    /**
     * Set the Vue-Directive 'v-model'.
     *
     * @param string $key
     * @param array $modifiers
     * @return $this
     * @throws \Nicat\HtmlFactory\Exceptions\VueDirectiveModifierNotAllowedException
     */
    public function vModel(string $key, array $modifiers=[])
    {
        /** @var ModelDirective $directive */
        $directive = $this->attributes->establish('v-model');
        $directive->setExpression($key);
        $directive->addModifiers($modifiers);
        return $this;
    }

}