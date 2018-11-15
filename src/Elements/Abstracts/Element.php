<?php

namespace Webflorist\HtmlFactory\Elements\Abstracts;

use Webflorist\HtmlFactory\Attributes\Traits\AllowsRoleAttribute;
use Webflorist\HtmlFactory\HtmlFactory;
use Webflorist\HtmlFactory\Attributes\Manager\AttributeManager;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsAriaDescribedbyAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsClassAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsDataAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsHiddenAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsIdAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsStyleAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsTitleAttribute;

/**
 * A HTML-element.
 *
 * Class Element
 * @package Webflorist\HtmlFactory
 */
abstract class Element
{

    // Use corresponding traits for all global HTML-attributes.
    use AllowsAriaDescribedbyAttribute,
        AllowsClassAttribute,
        AllowsDataAttribute,
        AllowsHiddenAttribute,
        AllowsIdAttribute,
        AllowsRoleAttribute,
        AllowsStyleAttribute,
        AllowsTitleAttribute;

    /**
     * AttributeManager
     *
     * @var AttributeManager
     */
    public $attributes;

    /**
     * Wrapper.
     *
     * @var ContainerElement|false
     */
    public $wrapper;

    /**
     * Array of calls to be applied to this element's wrapper.
     *
     * @var []
     */
    private $wrapperCallbacks = [];

    /**
     * Used for generation of wrapper.
     *
     * @var bool
     */
    private $wrapperGenerationInitiated = false;

    /**
     * Gets set to true after decorators were applied.
     *
     * @var bool
     */
    protected $wasDecorated = false;

    /**
     * Array of elements to be rendered before this element.
     * Can either be a string or another Element.
     *
     * @var []
     */
    private $insertBefore = [];

    /**
     * Array of elements to be rendered after this element.
     * Can either be a string or another Element.
     *
     * @var []
     */
    private $insertAfter = [];

    /**
     * Render the element to a string.
     *
     * @return string
     */
    abstract protected function render(): string;

    /**
     * Returns the name of the element.
     *
     * @return string
     */
    abstract protected function getName(): string;

    /**
     * Element constructor.
     */
    public function __construct()
    {
        $this->attributes = new AttributeManager($this);
        $this->setUp();
    }

    /**
     * Generate the element by applying decorators and rendering it.
     *
     * @return string
     */
    public function generate()
    {

        $this->applyDecorators();

        // If this element has a wrapper, we add this element as it's content,
        // and call the wrapper's generate() function.
        // $this->wrapperGenerationInitiated is set to true to avoid a loop,
        // when the wrapper calls generate() on it's content.
        // The wrapperCallbacks set via addWrapperCallback() are also applied to the wrapper here.
        if (!is_null($this->wrapper) && ($this->wrapper !== false) && !$this->wrapperGenerationInitiated) {
            $this->wrapperGenerationInitiated = true;

            $this->wrapper->prependContent($this);

            foreach ($this->wrapperCallbacks as $callback) {
                call_user_func_array([$this->wrapper,$callback[0]],$callback[1]);
            }

            return $this->wrapper->generate();
        }

        $output = $this->generateBeforeItems() . $this->render() . $this->generateAfterItems();

        $this->manipulateOutput($output);

        return $output;
    }

    /**
     * Gets called during construction.
     * Overwrite to perform setup-functionality.
     */
    protected function setUp()
    {
    }

    /**
     * Gets called before applying decorators.
     * Overwrite to perform manipulations.
     */
    protected function beforeDecoration()
    {
    }

    /**
     * Gets called after applying decorators.
     * Overwrite to perform manipulations.
     */
    protected function afterDecoration()
    {
    }

    /**
     * Manipulate the generated HTML.
     *
     * @param string $output
     */
    protected function manipulateOutput(string &$output)
    {
    }

    /**
     * Generate element automatically on __toString.
     *
     * @return string
     * @throws \Throwable
     */
    public function __toString()
    {
        return $this->generate();
    }

    /**
     * Is this element of type $class?
     *
     * @param string $class
     * @return bool
     */
    public function is(string $class)
    {
        return is_a($this, $class);
    }

    /**
     *  Applies all decorators.
     */
    public function applyDecorators()
    {
        if (!$this->wasDecorated) {

            $this->beforeDecoration();

            /** @var HtmlFactory $htmlfactoryService */
            $htmlfactoryService = app(HtmlFactory::class);
            $htmlfactoryService->decorators->decorate($this);

            $this->afterDecoration();

            $this->wasDecorated = true;
        }
    }

    /**
     * Wraps this element with another (Container)Element.
     *
     * @param ContainerElement|false $wrapper
     * @return $this
     */
    public function wrap($wrapper)
    {
        $this->wrapper = $wrapper;
        return $this;
    }

    /**
     * Adds a callback to be applied to this element's wrapper.
     *
     * @param $methodName
     * @param array $parameters
     * @return $this
     */
    public function addWrapperCallback($methodName, $parameters=[]) {
        $this->wrapperCallbacks[] = [
            $methodName,
            $parameters
        ];
        return $this;
    }

    /**
     * Adds an element to be rendered before this element.
     * $element can be either be another 'Element' object or a string.
     *
     * @param Element|string $element
     * @return $this
     */
    public function insertBefore($element)
    {
        $this->insertBefore[] = $element;
        return $this;
    }

    /**
     * Adds an element to be rendered after this element.
     * $element can be either be another 'Element' object or a string.
     *
     * @param Element|string $element
     * @return $this
     */
    public function insertAfter($element)
    {
        $this->insertAfter[] = $element;
        return $this;
    }

    /**
     * Generates items within $this->insertBefore.
     *
     * @return string
     */
    private function generateBeforeItems()
    {
        $html = '';
        foreach ($this->insertBefore as $child) {
            if (is_a($child, Element::class)) {
                $child = $child->generate();
            }
            $html .= $child;
        }
        return $html;
    }

    /**
     * Generates items within $this->insertAfter.
     *
     * @return string
     */
    private function generateAfterItems()
    {
        $html = '';
        foreach ($this->insertAfter as $child) {
            if (is_a($child, Element::class)) {
                $child = $child->generate();
            }
            $html .= $child;
        }
        return $html;
    }

}