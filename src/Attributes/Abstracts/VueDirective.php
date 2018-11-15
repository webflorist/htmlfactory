<?php

namespace Webflorist\HtmlFactory\Attributes\Abstracts;

use Webflorist\HtmlFactory\Exceptions\VueDirectiveModifierNotAllowedException;

/**
 * Abstract base-class for Vue-Directives.
 *
 * Class VueDirective
 * @package Webflorist\HtmlFactory
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
     * Returns the name of the directive.
     *
     * @return string
     */
    abstract public function getDirectiveName(): string;

    /**
     * Returns the name of the attribute.
     *
     * @return string
     */
    public final function getName(): string
    {
        $name = $this->getDirectiveName();

        if (!is_null($this->argument)) {
            $name .= ':' . $this->argument;
        }

        if (count($this->modifiers) > 0) {
            $name .= '.' . implode('.', $this->modifiers);
        }

        return $name;
    }

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

        if ($this->expectsExpression) {
            $output .= '="' . $this->expression . '"';
        }

        return $output;

    }

    /**
     * Sets the directive's expression.
     *
     * @param string $expression
     * @return $this
     */
    public function setExpression(string $expression)
    {
        $this->expression = $expression;
        return $this;
    }

    /**
     * Sets the directive's argument.
     *
     * @param string|null $argument
     * @return $this
     */
    public function setArgument($argument)
    {
        $this->argument = $argument;
        return $this;
    }

    /**
     * Does this directive have any argument set?
     *
     * @return bool
     */
    public function hasArgument()
    {
        return !is_null($this->argument);
    }

    /**
     * Adds a modifier.
     *
     * @param string $modifier
     * @return $this
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

        return $this;
    }

    /**
     * Adds multiple modifiers.
     *
     * @param array $modifiers
     * @return $this
     * @throws VueDirectiveModifierNotAllowedException
     */
    public function addModifiers(array $modifiers)
    {
        foreach ($modifiers as $modifier) {
            $this->addModifier($modifier);
        }

        return $this;
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