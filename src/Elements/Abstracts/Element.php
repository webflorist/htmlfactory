<?php

namespace Webflorist\HtmlFactory\Elements\Abstracts;

use Illuminate\Support\Arr;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsGeneralVueDirectives;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsRoleAttribute;
use Webflorist\HtmlFactory\Exceptions\PayloadNotFoundException;
use Webflorist\HtmlFactory\HtmlFactory;
use Webflorist\HtmlFactory\Attributes\Manager\AttributeManager;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsAriaDescribedbyAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsClassAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsDataAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsHiddenAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsIdAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsStyleAttribute;
use Webflorist\HtmlFactory\Attributes\Traits\AllowsTitleAttribute;
use Webflorist\HtmlFactory\HtmlFactoryTools;

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
        AllowsTitleAttribute,
        AllowsGeneralVueDirectives;

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
     * The view this element should be rendered with.
     *
     * @var string
     */
    private $view = null;

    /**
     * The name (=tag) of this element.
     *
     * @var string
     */
    protected $name = null;

    /**
     * The generated output.
     *
     * @var string
     */
    private $output = null;

    /**
     * Closure-decorators, that were added via decorate().
     *
     * @var \Closure[]
     */
    private $closureDecorators = [];

    /**
     * Any custom data, that can be retrieved via $this->getPayload().
     *
     * @var []
     */
    private $payload = [];

    /**
     * Render the element to an HTML-string.
     *
     * @return string
     */
    abstract public function renderHtml(): string;

    /**
     * Element constructor.
     */
    public function __construct()
    {
        $this->attributes = new AttributeManager($this);
        $this->setUp();
    }

    /**
     * Override the name(=tag) of the element.
     *
     * @param string $name
     * @return string
     */
    public function overrideName(string $name): string
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Returns the name of the element.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Render the element to a string.
     *
     * @return string
     */
    protected function render(): string
    {
        if (!is_null($this->view) && ($this->view) !== false) {
            return $this->renderView();
        }
        return $this->renderHtml();
    }

    /**
     * Render the element to a string using a view.
     *
     * @return string
     */
    protected function renderView(): string
    {
        return view(
            $this->view,
            [
                'el' => $this
            ]
        );
    }

    /**
     * Generate the element by applying decorators and rendering it.
     *
     * @return string
     */
    public function generate()
    {

        if (is_null($this->output)) {

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
                    call_user_func_array([$this->wrapper, $callback[0]], $callback[1]);
                }

                return $this->wrapper->generate();
            }

            $this->output =
                $this->generateBeforeItems() .
                $this->render() .
                $this->generateAfterItems();

            $this->manipulateOutput($this->output);

        }

        return $this->output;
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
        if (is_a($this, $class)) {
            return true;
        }
        return array_search($class, HtmlFactoryTools::resolveObjectClasses($this)) !== false;
    }

    /**
     *  Applies all decorators.
     */
    public function applyDecorators()
    {
        if (!$this->wasDecorated) {

            $this->beforeDecoration();

            /** @var HtmlFactory $htmlFactoryService */
            $htmlFactoryService = app(HtmlFactory::class);
            $htmlFactoryService->decorators->decorate($this);

            $this->applyClosureDecorators();

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
    public function addWrapperCallback($methodName, $parameters = [])
    {
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
        return $this->generateElements($this->insertBefore);
    }

    /**
     * Generates items within $this->insertAfter.
     *
     * @return string
     */
    private function generateAfterItems()
    {
        return $this->generateElements($this->insertAfter);
    }

    /**
     * Sets the view this element should be rendered with.
     *
     * @param string|false $view
     * @return $this
     */
    public function view($view)
    {
        $this->view = $view;
        return $this;
    }

    /**
     * Generates all Elments in an array into a string.
     *
     * @param Element[] $elements
     * @return string
     */
    protected function generateElements(array $elements)
    {
        $html = '';
        foreach ($elements as $child) {
            if (is_a($child, Element::class)) {
                $child = $child->generate();
            }
            $html .= $child;
        }
        return $html;
    }

    /**
     * Adds a Decorator-closure to this element,
     * that will be called on it's generation.
     *
     * The closure will be supplied with the element
     * as it's only parameter.
     *
     * @param \Closure $closure
     * @return Element
     */
    public function decorate(\Closure $closure)
    {
        $this->closureDecorators[] = $closure;
        return $this;
    }

    /**
     * Applies Decorator-closures supplied via ->decorate().
     */
    private function applyClosureDecorators()
    {
        foreach ($this->closureDecorators as $closure) {
            call_user_func_array($closure, [$this]);
        }
    }

    /**
     * Returns specific custom data.
     *
     * Can also get data at specific location
     * using "dot" notation.
     *
     * @param string $key
     * @param null $defaultValue
     * @return mixed
     * @throws PayloadNotFoundException
     */
    public function getPayload(string $key, $defaultValue = null)
    {
        if (!$this->hasPayload($key)) {
            if (!is_null($defaultValue)) {
                return $defaultValue;
            }
            throw new PayloadNotFoundException("No data found for key '$key'. Eiher add the data or state a default value.'");
        }
        return Arr::get($this->payload, $key);
    }

    /**
     * Is a payload set?
     *
     * Can also check at specific location
     * using "dot" notation.
     *
     * @param string $key
     * @return bool
     */
    public function hasPayload(string $key)
    {
        return Arr::has($this->payload, $key);
    }

    /**
     * Set any payload in array-form.
     *
     * Can also set data at specific location
     * using "dot" notation via the $key
     * parameter.
     *
     * @param string|array $payload
     * @param string $key
     * @return $this
     */
    public function payload($payload, string $key = '')
    {
        if (strlen($key) > 0) {
            Arr::set($this->payload, $key, $payload);
        }
        else {
            $this->payload = $payload;
        }
        return $this;
    }

}