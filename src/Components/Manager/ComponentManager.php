<?php

namespace Webflorist\HtmlFactory\Components\Manager;

use Webflorist\HtmlFactory\Components\Contracts\RegisteredComponentInterface;
use Webflorist\HtmlFactory\Elements\Abstracts\Element;
use Webflorist\HtmlFactory\Exceptions\ComponentAccessorAlreadyUsedException;
use Webflorist\HtmlFactory\Exceptions\ComponentNotFoundException;

class ComponentManager
{

    /**
     * Array of registered components.
     *
     * @var string[]
     */
    protected $components;

    /**
     * Register components from the files of a directory.
     *
     * Set $force to true to forcefully register these components,
     * even if another component is already registered using the same accessor.
     *
     * @param string $namespace
     * @param string $folder
     * @param bool $force
     * @throws ComponentAccessorAlreadyUsedException
     * @throws ComponentNotFoundException
     */
    public function registerFromFolder(string $namespace, string $folder, bool $force = false)
    {
        $componentFiles = scandir($folder);

        foreach ($componentFiles as $key => $componentFileName) {
            if (strpos($componentFileName, ".php") > 0) {
                $this->register($namespace . "\\" . substr($componentFileName, 0, -4), $force);
            }
        }
    }

    /**
     * Registers a className as a component.
     *
     * The class must fulfill the following requirements:
     * - be a descendant of 'Webflorist\HtmlFactory\Elements\Abstracts\Element'
     * - and implement 'Webflorist\HtmlFactory\Components\Contracts\RegisteredComponentInterface'.
     *
     * Set $force to true to forcefully register this component,
     * even if another component is already registered using the same accessor.
     *
     * @param string $className
     * @param bool $force
     * @throws ComponentAccessorAlreadyUsedException
     * @throws ComponentNotFoundException
     */
    public function register(string $className, bool $force = false)
    {
        if (!class_exists($className)) {
            throw new ComponentNotFoundException('Component with class "' . $className . '" not found.');
        }

        if (!is_subclass_of($className, RegisteredComponentInterface::class)) {
            throw new ComponentNotFoundException('Class "' . $className . '" does not implement "RegisteredComponentInterface".');
        }

        if (!is_a($className, Element::class, true)) {
            throw new ComponentNotFoundException('Class "' . $className . '" is not an Element.');
        }

        /** @var RegisteredComponentInterface $className */
        $accessor = $className::getAccessor();

        if (isset($this->components[$accessor]) && ($this->components[$accessor] !== $className) && !$force) {
            throw new ComponentAccessorAlreadyUsedException(
                'Component with class "' . $className . '" could not be registered, since it\'s accessor "' . $accessor . '" is already used by another component ("' . $this->components[$accessor] . '"). Set parameter $force to true to overwrite component.');
        }

        $this->components[$accessor] = $className;
    }

    /**
     * Checks, if a component is registered for a stated $accessor.
     *
     * @param string $accessor
     * @return bool
     */
    public function isRegistered(string $accessor) : bool
    {
        return isset($this->components[$accessor]);
    }

    /**
     * Returns the class of a component by it's accessor.
     *
     * @param string $accessor
     * @return string
     * @throws ComponentNotFoundException
     */
    public function getClass(string $accessor) : string
    {

        if (!isset($this->components[$accessor])) {
            throw new ComponentNotFoundException('No component registered under the accessor "' . $accessor . '".');
        }

        return $this->components[$accessor];
    }
}