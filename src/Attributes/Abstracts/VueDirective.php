<?php

namespace Nicat\HtmlFactory\Attributes\Abstracts;

use Nicat\HtmlFactory\Exceptions\VueDirectiveModifierNotAllowedException;

/**
 * Abstract base-class for Vue-Directives.
 *
 * Class VueDirective
 * @package Nicat\HtmlFactory
 */
abstract class VueDirective extends Attribute
{
    /**
     * Does this directive expect an expression?
     * e.g. 'v-else' does not expect expression
     * and is therefor rendered without an attribute-value.
     *
     * @var bool
     */
    protected $expectsExpression = true;

    /**
     * The directive's expression.
     *
     * @var null|string
     */
    protected $expression = null;

    /**
     * The directive's argument.
     *
     * @var null|string
     */
    protected $argument = null;

    /**
     * The directive's modifiers.
     *
     * @var string[]
     */
    private $modifiers = [];

    /**
     * Returns the rendered value.
     *
     * @return string|null
     */
    public function getValue()
    {
        return $this->expression;
    }

    /**
     * Is this attribute set?
     *
     * @return bool
     */
    public function isSet(): bool
    {
        // A Vue attribute is always considered as set.
        return true;
    }

    /**
     * Renders the complete directive.
     *
     * @return string
     */
    public function render(): string
    {
        $output = $this->getName();

        if (!is_null($this->argument)) {
            $output .= ':' . $this->argument;
        }

        if (count($this->modifiers) > 0) {
            $output .= '.' . implode('.', $this->modifiers);
        }

        if ($this->expectsExpression) {
            $output .= '="' . $this->expression . '"';
        }

        return $output;

    }

    /**
     * Sets the directive's expression.
     *
     * @param string $expression
     */
    public function setExpression(string $expression)
    {
        $this->expression = $expression;
    }

    /**
     * Sets the directive's argument.
     *
     * @param string|null $argument
     */
    public function setArgument($argument)
    {
        $this->argument = $argument;
    }

    /**
     * Adds a modifier.
     *
     * @param string $modifier
     * @throws VueDirectiveModifierNotAllowedException
     */
    public function addModifier(string $modifier)
    {
        if (!$this->modifierIsAllowed($modifier)) {
            throw new VueDirectiveModifierNotAllowedException('Modifier "' . $modifier . '" is not allowed for Vue-directive "' . $this->getName() . '".');
        }

        if (!$this->hasModifier($modifier)) {
            $this->modifiers[] = $modifier;
        }
    }

    /**
     * Adds multiple modifiers.
     *
     * @param array $modifiers
     * @throws VueDirectiveModifierNotAllowedException
     */
    public function addModifiers(array $modifiers)
    {
        foreach ($modifiers as $modifier) {
            $this->addModifier($modifier);
        }
    }

    /**
     * Return array of allowed modifiers.
     * Overwrite to return array of modifiers allowed for this directive.
     * Returning true allows all modifiers.
     *
     * @return string[]|true
     */
    protected function getAllowedModifiers()
    {
        return [];
    }

    /**
     * Checks, if a modifier is present in $this->getAllowedModifiers().
     *
     * @param string $value
     * @return bool
     */
    protected function modifierIsAllowed($value): bool
    {
        $allowedValues = $this->getAllowedModifiers();
        if ($allowedValues === true) {
            return true;
        }
        if (is_array($allowedValues)) {
            return array_search($value, $allowedValues) !== false;
        }
        return false;
    }

    /**
     * Is a modifier set for this directive?
     *
     * @param string $modifier
     * @return bool
     */
    private function hasModifier(string $modifier): bool
    {
        return array_search($modifier, $this->modifiers) !== false;
    }

}