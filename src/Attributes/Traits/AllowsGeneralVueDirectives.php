<?php

namespace Nicat\HtmlFactory\Attributes\Traits;

use Nicat\HtmlFactory\Attributes\Vue\BindDirective;
use Nicat\HtmlFactory\Attributes\Vue\CloakDirective;
use Nicat\HtmlFactory\Attributes\Vue\CustomDirective;
use Nicat\HtmlFactory\Attributes\Vue\ElseDirective;
use Nicat\HtmlFactory\Attributes\Vue\ElseIfDirective;
use Nicat\HtmlFactory\Attributes\Vue\ForDirective;
use Nicat\HtmlFactory\Attributes\Vue\HtmlDirective;
use Nicat\HtmlFactory\Attributes\Vue\IfDirective;
use Nicat\HtmlFactory\Attributes\Vue\OnceDirective;
use Nicat\HtmlFactory\Attributes\Vue\OnDirective;
use Nicat\HtmlFactory\Attributes\Vue\PreDirective;
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
        $this->attributes->establish(TextDirective::class)
            ->setExpression($text);
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
        $this->attributes->establish(HtmlDirective::class)
            ->setExpression($html);
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
        $this->attributes->establish(ShowDirective::class)
            ->setExpression($expression);
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
        $this->attributes->establish(IfDirective::class)
            ->setExpression($expression);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-else'.
     *
     * @return $this
     */
    public function vElse()
    {
        $this->attributes->establish(ElseDirective::class);
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
        $this->attributes->establish(ElseIfDirective::class)
            ->setExpression($expression);
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
        $this->attributes->establish(ForDirective::class)
            ->setExpression($expression);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-on'.
     *
     * @param string|null $event
     * @param string $expression
     * @param array $modifiers
     * @return $this
     */
    public function vOn($event, string $expression, array $modifiers = [])
    {
        /** @var OnDirective $directive */
        $this->attributes->establish(OnDirective::class, [$event])
            ->setExpression($expression)
            ->addModifiers($modifiers);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-bind'.
     *
     * @param string|null $attrOrProp
     * @param string $expression
     * @param array $modifiers
     * @return $this
     */
    public function vBind($attrOrProp, string $expression, array $modifiers = [])
    {
        $this->attributes->establish(BindDirective::class, [$attrOrProp])
            ->setExpression($expression)
            ->addModifiers($modifiers);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-pre'.
     *
     * @return $this
     */
    public function vPre()
    {
        $this->attributes->establish(PreDirective::class);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-cloak'.
     *
     * @return $this
     */
    public function vCloak()
    {
        $this->attributes->establish(CloakDirective::class);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-once'.
     *
     * @return $this
     */
    public function vOnce()
    {
        $this->attributes->establish(OnceDirective::class);
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
     */
    public function vCustom(string $name, $argument = null, string $expression = null, array $modifiers = [])
    {
        $this->attributes->establish(CustomDirective::class, [$name, $argument])
            ->setExpression($expression)
            ->addModifiers($modifiers);
        return $this;
    }

    /**
     * Set the Vue-Directive 'v-on' listening to the DOM event 'click'.
     *
     * @param string $expression
     * @param array $modifiers
     * @return $this
     */
    public function vOnClick(string $expression, array $modifiers = [])
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
     */
    public function vOnChange(string $expression, array $modifiers = [])
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
     */
    public function vOnMouseOver(string $expression, array $modifiers = [])
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
     */
    public function vOnMouseOut(string $expression, array $modifiers = [])
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
     */
    public function vOnKeyDown(string $expression, array $modifiers = [])
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
     */
    public function vOnKeyUp(string $expression, array $modifiers = [])
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
     */
    public function vOnLoad(string $expression, array $modifiers = [])
    {
        $this->vOn('load', $expression, $modifiers);
        return $this;
    }

}