<?php

namespace Nicat\HtmlFactory;

/**
 * Class with various static helper-methods.
 *
 * Class HtmlFactoryTools
 * @package Nicat\HtmlFactory
 *
 */
class HtmlFactoryTools
{

    /**
     * Resolves classes and interfaces of $class
     * and all it's parents.
     *
     * @param string|object $class
     * @return array
     */
    public static function resolveObjectClasses($class) : array
    {
        if (is_object($class)) {
            $class = get_class($class);
        }
        return array_merge(
            [$class => $class],
            class_parents($class),
            class_implements($class),
            class_uses_recursive($class)
        );
    }

}