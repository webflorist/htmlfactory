<?php

namespace Webflorist\HtmlFactory\Attributes\Traits;

use Webflorist\HtmlFactory\Attributes\Vue\BindDirective;
use Webflorist\HtmlFactory\Attributes\Vue\ElseDirective;
use Webflorist\HtmlFactory\Attributes\Vue\ElseIfDirective;
use Webflorist\HtmlFactory\Attributes\Vue\HtmlDirective;
use Webflorist\HtmlFactory\Attributes\Vue\IfDirective;
use Webflorist\HtmlFactory\Attributes\Vue\ModelDirective;
use Webflorist\HtmlFactory\Attributes\Vue\OnDirective;
use Webflorist\HtmlFactory\Attributes\Vue\ShowDirective;
use Webflorist\HtmlFactory\Attributes\Vue\TextDirective;

trait AllowsVueModelDirective
{

    /**
     * Set the Vue-Directive 'v-model'.
     *
     * @param string $key
     * @param array $modifiers
     * @return $this
     * @throws \Webflorist\HtmlFactory\Exceptions\VueDirectiveModifierNotAllowedException
     */
    public function vModel(string $key, array $modifiers=[])
    {
        /** @var ModelDirective $directive */
        $directive = $this->attributes->establish(ModelDirective::class);
        $directive->setExpression($key);
        $directive->addModifiers($modifiers);
        return $this;
    }

}