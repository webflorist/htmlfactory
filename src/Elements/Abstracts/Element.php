<?php

namespace Nicat\HtmlFactory\Elements\Abstracts;

use Nicat\HtmlFactory\Attributes\Traits\AllowsRoleAttribute;
use Nicat\HtmlFactory\HtmlFactory;
use Nicat\HtmlFactory\Attributes\Manager\AttributeManager;
use Nicat\HtmlFactory\Attributes\Traits\AllowsAriaDescribedbyAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsClassAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsDataAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsHiddenAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsIdAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsStyleAttribute;
use Nicat\HtmlFactory\Attributes\Traits\AllowsTitleAttribute;

/**
 * A HTML-element.
 *
 * Class Element
 * @package Nicat\HtmlFactory
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
     * @var ContainerElement
     */
    public $wrapper;

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
    private $wasDecorated = false;

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
        if (!is_null($this->wrapper) && !$this->wrapperGenerationInitiated) {
            $this->wrapperGenerationInitiated = true;
            return $this->wrapper->prependContent($this)->generate();
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
        if ($wrapper === false) {
            $wrapper = null;
        }
        $this->wrapper = $wrapper;
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