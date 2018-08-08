<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\Vue\BindDirective;
use Nicat\HtmlFactory\Attributes\Vue\CustomDirective;
use Nicat\HtmlFactory\Attributes\Vue\ElseDirective;
use Nicat\HtmlFactory\Attributes\Vue\ElseIfDirective;
use Nicat\HtmlFactory\Attributes\Vue\HtmlDirective;
use Nicat\HtmlFactory\Attributes\Vue\IfDirective;
use Nicat\HtmlFactory\Attributes\Vue\OnDirective;
use Nicat\HtmlFactory\Attributes\Vue\ShowDirective;
use Nicat\HtmlFactory\Attributes\Vue\TextDirective;

trait AllowsGeneralVueDirectives
{

    /**
     * Set the Vue-Directive 'v-text'.
     *
     * @param string $text
     * @return $this
     */
    public function vText(string $text)
    {
        /** @var TextDirective $directive */
        $directive = $this->attributes->establish('v-text');
        $directive->setExpression($text);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-html'.
     *
     * @param string $html
     * @return $this
     */
    public function vHtml(string $html)
    {
        /** @var HtmlDirective $directive */
        $directive = $this->attributes->establish('v-html');
        $directive->setExpression($html);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-show'.
     *
     * @param string $expression
     * @return $this
     */
    public function vShow(string $expression)
    {
        /** @var ShowDirective $directive */
        $directive = $this->attributes->establish('v-show');
        $directive->setExpression($expression);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-if'.
     *
     * @param string $expression
     * @return $this
     */
    public function vIf(string $expression)
    {
        /** @var IfDirective $directive */
        $directive = $this->attributes->establish('v-if');
        $directive->setExpression($expression);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-else'.
     *
     * @return $this
     */
    public function vElse()
    {
        $this->attributes->establish('v-else');
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-else-if'.
     *
     * @param string $expression
     * @return $this
     */
    public function vElseIf(string $expression)
    {
        /** @var ElseIfDirective $directive */
        $directive = $this->attributes->establish('v-else-if');
        $directive->setExpression($expression);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-for'.
     *
     * @param string $expression
     * @return $this
     */
    public function vFor(string $expression)
    {
        /** @var ElseIfDirective $directive */
        $directive = $this->attributes->establish('v-for');
        $directive->setExpression($expression);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-on'.
     *
     * @param string|null $argument
     * @param string $expression
     * @param array $modifiers
     * @return $this
     * @throws \Nicat\HtmlFactory\Exceptions\VueDirectiveModifierNotAllowedException
     */
    public function vOn($argument, string $expression, array $modifiers=[])
    {
        /** @var OnDirective $directive */
        $directive = $this->attributes->establish('v-on');
        $directive->setArgument($argument);
        $directive->setExpression($expression);
        $directive->addModifiers($modifiers);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-bind'.
     *
     * @param string|null $argument
     * @param string $expression
     * @param array $modifiers
     * @return $this
     * @throws \Nicat\HtmlFactory\Exceptions\VueDirectiveModifierNotAllowedException
     */
    public function vBind($argument, string $expression, array $modifiers=[])
    {
        /** @var BindDirective $directive */
        $directive = $this->attributes->establish('v-bind');
        $directive->setArgument($argument);
        $directive->setExpression($expression);
        $directive->addModifiers($modifiers);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-pre'.
     *
     * @return $this
     */
    public function vPre()
    {
        $this->attributes->establish('v-pre');
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-cloak'.
     *
     * @return $this
     */
    public function vCloak()
    {
        $this->attributes->establish('v-cloak');
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-once'.
     *
     * @return $this
     */
    public function vOnce()
    {
        $this->attributes->establish('v-once');
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-bind'.
     *
     * @param string $name
     * @param string|null $argument
     * @param string|null $expression
     * @param array $modifiers
     * @return $this
     * @throws \Nicat\HtmlFactory\Exceptions\VueDirectiveModifierNotAllowedException
     */
    public function vCustom(string $name, $argument=null, string $expression=null, array $modifiers=[])
    {
        /** @var CustomDirective $directive */
        $directive = $this->attributes->establish('v-' . $name);
        $directive->setArgument($argument);
        $directive->setExpression($expression);
        $directive->addModifiers($modifiers);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-on' listening to the DOM event 'click'.
     *
     * @param string $expression
     * @param array $modifiers
     * @return $this
     * @throws \Nicat\HtmlFactory\Exceptions\VueDirectiveModifierNotAllowedException
     */
    public function vOnClick(string $expression, array $modifiers=[])
    {
        $this->vOn('click', $expression, $modifiers);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-on' listening to the DOM event 'change'.
     *
     * @param string $expression
     * @param array $modifiers
     * @return $this
     * @throws \Nicat\HtmlFactory\Exceptions\VueDirectiveModifierNotAllowedException
     */
    public function vOnChange(string $expression, array $modifiers=[])
    {
        $this->vOn('change', $expression, $modifiers);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-on' listening to the DOM event 'mouseover'.
     *
     * @param string $expression
     * @param array $modifiers
     * @return $this
     * @throws \Nicat\HtmlFactory\Exceptions\VueDirectiveModifierNotAllowedException
     */
    public function vOnMouseOver(string $expression, array $modifiers=[])
    {
        $this->vOn('mouseover', $expression, $modifiers);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-on' listening to the DOM event 'mouseout'.
     *
     * @param string $expression
     * @param array $modifiers
     * @return $this
     * @throws \Nicat\HtmlFactory\Exceptions\VueDirectiveModifierNotAllowedException
     */
    public function vOnMouseOut(string $expression, array $modifiers=[])
    {
        $this->vOn('mouseout', $expression, $modifiers);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-on' listening to the DOM event 'keydown'.
     *
     * @param string $expression
     * @param array $modifiers
     * @return $this
     * @throws \Nicat\HtmlFactory\Exceptions\VueDirectiveModifierNotAllowedException
     */
    public function vOnKeyDown(string $expression, array $modifiers=[])
    {
        $this->vOn('keydown', $expression, $modifiers);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-on' listening to the DOM event 'keyup'.
     *
     * @param string $expression
     * @param array $modifiers
     * @return $this
     * @throws \Nicat\HtmlFactory\Exceptions\VueDirectiveModifierNotAllowedException
     */
    public function vOnKeyUp(string $expression, array $modifiers=[])
    {
        $this->vOn('keyup', $expression, $modifiers);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-on' listening to the DOM event 'load'.
     *
     * @param string $expression
     * @param array $modifiers
     * @return $this
     * @throws \Nicat\HtmlFactory\Exceptions\VueDirectiveModifierNotAllowedException
     */
    public function vOnLoad(string $expression, array $modifiers=[])
    {
        $this->vOn('load', $expression, $modifiers);
        return $this;
    }

}