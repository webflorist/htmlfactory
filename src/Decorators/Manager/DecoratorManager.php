<?php

namespace Nicat\HtmlFactory\Decorators\Manager;

use Nicat\HtmlFactory\Decorators\Abstracts\Decorator;
use Nicat\HtmlFactory\Elements\Abstracts\Element;
use Nicat\HtmlFactory\Exceptions\DecoratorNotFoundException;
use Nicat\HtmlFactory\HtmlFactory;

class DecoratorManager
{

    /**
     * Injected HtmlFactory service.
     *
     * @var HtmlFactory
     */
    protected $htmlFactory;

    /**
     * Array of registered decorators.
     *
     * @var string[]
     */
    protected $decorators = [];

    /**
     * A two-dimensional array, that lists all (parent-)classes of elements.
     * Gets populated at the start of decoration to determine the applicable decorators.
     *
     * @var string[][]
     */
    protected $elementClasses = [];

    /**
     * DecoratorManager constructor.
     * @param HtmlFactory $htmlFactory
     */
    public function __construct(HtmlFactory $htmlFactory)
    {
        $this->htmlFactory = $htmlFactory;
    }

    /**
     * Register decorators from the files of a directory.
     *
     * The classes of these files must extend 'Nicat\HtmlFactory\Decorators\Abstracts\Decorator'.
     *
     * @param string $namespace
     * @param string $folder
     * @throws DecoratorNotFoundException
     */
    public function registerFromFolder(string $namespace, string $folder)
    {
        $decoratorFiles = scandir($folder);

        foreach ($decoratorFiles as $key => $decoratorFileName) {
            if (strpos($decoratorFileName, ".php") > 0) {
                $this->register($namespace . "\\" . substr($decoratorFileName, 0, -4));
            }
        }
    }

    /**
     * Registers a className as a decorator.
     *
     * The class must extend 'Nicat\HtmlFactory\Decorators\Abstracts\Decorator'.
     *
     * @param string $className
     * @throws DecoratorNotFoundException
     */
    public function register(string $className)
    {
        if (!class_exists($className)) {
            throw new DecoratorNotFoundException('Decorator with class "' . $className . '" not found.');
        }

        if (!is_a($className, Decorator::class, true)) {
            throw new DecoratorNotFoundException('Class "' . $className . '" is not a decorator.');
        }

        /** @var Decorator $className */
        // We only register the decorator, if it supports the current frontend-framework.
        if ($this->decoratorSupportsFrontendFramework($className)) {
            $this->decorators[$className] = $className;
        }
    }

    /**
     * Decorate an element.
     *
     * @param Element $element
     */
    public function decorate(Element $element)
    {
        foreach ($this->decorators as $decoratorClass) {
            if ($this->decoratorCanDecorateElement($decoratorClass, $element)) {
                \Log::info("before:".$decoratorClass);
                /** @var Decorator $decorator */
                $decorator = new $decoratorClass($element);
                $decorator->decorate();
                \Log::info("after:".$decoratorClass);
            }
        }
    }

    /**
     * Resolves all classes and parent classes of an element and stores them in $this->elementClasses.
     *
     * @param $elementClass
     */
    private function resolveElementClasses($elementClass)
    {
        if (!isset($this->elementClasses[$elementClass])) {
            $this->elementClasses[$elementClass] = array_merge(
                [$elementClass => $elementClass],
                class_parents($elementClass),
                class_implements($elementClass)
            );
        }
    }

    /**
     * Checks if the decorator with class $decoratorClass can decorate $element.
     *
     * @param string $decoratorClass
     * @param Element $element
     * @return bool
     */
    private function decoratorCanDecorateElement($decoratorClass, Element $element)
    {
        $elementClass = get_class($element);
        $this->resolveElementClasses($elementClass);
        /** @var Decorator $decoratorClass */
        if (count(array_intersect($this->elementClasses[$elementClass],$decoratorClass::getSupportedElements()))>0) {
            return true;
        }
        return false;
    }


    /**
     * Does this class support the currently set frontend framework (and version)?
     *
     * @param string $decoratorClass
     * @return bool
     */
    private function decoratorSupportsFrontendFramework(string $decoratorClass)
    {
        /** @var Decorator $decoratorClass */
        $supportedFrameworks = $decoratorClass::getSupportedFrameworks();

        // If $supportedFrameworks is an empty array, this decorator is always applicable.
        if (count($supportedFrameworks) === 0) {
            return true;
        }

        // If the specific framework is supported regardless of version, return true.
        if (array_search($this->htmlFactory->frontendFramework,$supportedFrameworks) !== false) {
            return true;
        }

        // If a specific version is stated, this decorator must explicitly support that version.
        if (!is_null($this->htmlFactory->frontendFrameworkVersion)) {
            if (array_search($this->htmlFactory->frontendFramework.':'.$this->htmlFactory->frontendFrameworkVersion,$supportedFrameworks) !== false) {
                return true;
            }
        }

        return false;
    }
}