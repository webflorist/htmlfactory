<?php

namespace Webflorist\HtmlFactory;

use Webflorist\HtmlFactory\Decorators\Manager\DecoratorManager;
use Webflorist\HtmlFactory\Components\Manager\ComponentManager;
use Webflorist\HtmlFactory\Elements\H1Element;
use Webflorist\HtmlFactory\Elements\ImgElement;
use Webflorist\HtmlFactory\Elements\PElement;
use Webflorist\HtmlFactory\Elements\TemplateElement;
use Webflorist\HtmlFactory\Exceptions\InvalidAccessorException;
use Webflorist\HtmlFactory\Elements\Abstracts\Element;
use Webflorist\HtmlFactory\Elements\SpanElement;
use Webflorist\HtmlFactory\Elements\DivElement;
use Webflorist\HtmlFactory\Elements\FieldsetElement;
use Webflorist\HtmlFactory\Elements\BrElement;
use Webflorist\HtmlFactory\Elements\FormElement;
use Webflorist\HtmlFactory\Elements\LabelElement;
use Webflorist\HtmlFactory\Elements\LegendElement;
use Webflorist\HtmlFactory\Elements\InputElement;
use Webflorist\HtmlFactory\Components\TextInputComponent;
use Webflorist\HtmlFactory\Components\EmailInputComponent;
use Webflorist\HtmlFactory\Components\NumberInputComponent;
use Webflorist\HtmlFactory\Components\ColorInputComponent;
use Webflorist\HtmlFactory\Components\DateInputComponent;
use Webflorist\HtmlFactory\Components\DatetimeInputComponent;
use Webflorist\HtmlFactory\Components\DatetimeLocalInputComponent;
use Webflorist\HtmlFactory\Components\CheckboxInputComponent;
use Webflorist\HtmlFactory\Components\RadioInputComponent;
use Webflorist\HtmlFactory\Elements\TextareaElement;
use Webflorist\HtmlFactory\Components\HiddenInputComponent;
use Webflorist\HtmlFactory\Components\FileInputComponent;
use Webflorist\HtmlFactory\Components\MonthInputComponent;
use Webflorist\HtmlFactory\Components\PasswordInputComponent;
use Webflorist\HtmlFactory\Components\SearchInputComponent;
use Webflorist\HtmlFactory\Components\RangeInputComponent;
use Webflorist\HtmlFactory\Components\TelInputComponent;
use Webflorist\HtmlFactory\Components\TimeInputComponent;
use Webflorist\HtmlFactory\Components\WeekInputComponent;
use Webflorist\HtmlFactory\Components\UrlInputComponent;
use Webflorist\HtmlFactory\Elements\SmallElement;
use Webflorist\HtmlFactory\Elements\SupElement;
use Webflorist\HtmlFactory\Elements\ButtonElement;
use Webflorist\HtmlFactory\Elements\SelectElement;
use Webflorist\HtmlFactory\Elements\OptionElement;
use Webflorist\HtmlFactory\Elements\OptgroupElement;
use Webflorist\HtmlFactory\Components\SubmitButtonComponent;
use Webflorist\HtmlFactory\Components\ResetButtonComponent;
use Webflorist\HtmlFactory\Components\AlertComponent;
use Webflorist\HtmlFactory\Components\PanelComponent;

/**
 * The main class of this package.
 * Provides (magic) factory methods for all HTML-elements and included Components.
 *
 * Class HtmlFactory
 * @package Webflorist\HtmlFactory
 *
 * Elements:
 * =========
 * @method static BrElement                 br()
 * @method static ButtonElement             button()
 * @method static DivElement                div()
 * @method static FieldsetElement           fieldset()
 * @method static FormElement               form()
 * @method static H1Element                 h1()
 * @method static ImgElement                img()
 * @method static InputElement              input()
 * @method static LabelElement              label()
 * @method static LegendElement             legend()
 * @method static OptgroupElement           optgroup()
 * @method static OptionElement             option()
 * @method static PElement                  p()
 * @method static SelectElement             select()
 * @method static SmallElement              small()
 * @method static SpanElement               span()
 * @method static SupElement                sup()
 * @method static TextareaElement           textarea()
 * @method static TemplateElement           template()
 *
 * Components:
 * ===========
 * - Input-Types:
 * @method static CheckboxInputComponent      checkboxInput()
 * @method static ColorInputComponent         colorInput()
 * @method static DateInputComponent          dateInput()
 * @method static DatetimeInputComponent      datetimeInput()
 * @method static DatetimeLocalInputComponent datetimeLocalInput()
 * @method static EmailInputComponent         emailInput()
 * @method static FileInputComponent          fileInput()
 * @method static HiddenInputComponent        hiddenInput()
 * @method static MonthInputComponent         monthInput()
 * @method static NumberInputComponent        numberInput()
 * @method static PasswordInputComponent      passwordInput()
 * @method static RadioInputComponent         radioInput()
 * @method static RangeInputComponent         rangeInput()
 * @method static SearchInputComponent        searchInput()
 * @method static TelInputComponent           telInput()
 * @method static TextInputComponent          textInput()
 * @method static TimeInputComponent          timeInput()
 * @method static UrlInputComponent           urlInput()
 * @method static WeekInputComponent          weekInput()
 *
 * - Button-Types:
 * @method static SubmitButtonComponent       submitButton()
 * @method static ResetButtonComponent        resetButton()
 *
 * - Other Components:
 * @method static AlertComponent            alert(string $context)
 * @method static PanelComponent            panel()
 *
 */
class HtmlFactory
{
    /**
     * The ComponentManager manages all registered components.
     *
     * @var ComponentManager
     */
    public $components;

    /**
     * The DecoratorManager manages all registered decorators.
     *
     * @var DecoratorManager
     */
    public $decorators;

    /**
     * HtmlFactory constructor.
     */
    public function __construct()
    {
        $this->components = new ComponentManager();
        $this->decorators = new DecoratorManager($this);
    }

    /**
     * Magic method to construct a HTML-element or -component.
     * See '@method' declarations of class-phpdoc
     * for available methods.
     *
     * @param $accessor
     * @param $arguments
     * @return Element
     *
     * @throws Exceptions\ComponentNotFoundException
     * @throws InvalidAccessorException
     */
    public function __call($accessor, $arguments)
    {
        // If the accessor refers to a element, we return a new instance of it.
        $elementClass = 'Webflorist\\HtmlFactory\\Elements\\' . ucfirst($accessor) . 'Element';
        if (class_exists($elementClass)) {
            return new $elementClass(...$arguments);
        }

        // If the accessor refers to a component, we return a new instance of it.
        if ($this->components->isRegistered($accessor)) {
            $componentClass = $this->components->getClass($accessor);
            return new $componentClass(...$arguments);
        }

        // If the accessor is neither a element nor a component, we throw an exception.
        throw new InvalidAccessorException('No element found for accessor "'.$accessor.'".');

    }

}