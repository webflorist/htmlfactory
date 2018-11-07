<?php

namespace Nicat\HtmlFactory;

use Nicat\HtmlFactory\Decorators\Manager\DecoratorManager;
use Nicat\HtmlFactory\Components\Manager\ComponentManager;
use Nicat\HtmlFactory\Elements\H1Element;
use Nicat\HtmlFactory\Elements\ImgElement;
use Nicat\HtmlFactory\Elements\PElement;
use Nicat\HtmlFactory\Elements\TemplateElement;
use Nicat\HtmlFactory\Exceptions\InvalidAccessorException;
use Nicat\HtmlFactory\Elements\Abstracts\Element;
use Nicat\HtmlFactory\Elements\SpanElement;
use Nicat\HtmlFactory\Elements\DivElement;
use Nicat\HtmlFactory\Elements\FieldsetElement;
use Nicat\HtmlFactory\Elements\BrElement;
use Nicat\HtmlFactory\Elements\FormElement;
use Nicat\HtmlFactory\Elements\LabelElement;
use Nicat\HtmlFactory\Elements\LegendElement;
use Nicat\HtmlFactory\Elements\InputElement;
use Nicat\HtmlFactory\Components\TextInputComponent;
use Nicat\HtmlFactory\Components\EmailInputComponent;
use Nicat\HtmlFactory\Components\NumberInputComponent;
use Nicat\HtmlFactory\Components\ColorInputComponent;
use Nicat\HtmlFactory\Components\DateInputComponent;
use Nicat\HtmlFactory\Components\DatetimeInputComponent;
use Nicat\HtmlFactory\Components\DatetimeLocalInputComponent;
use Nicat\HtmlFactory\Components\CheckboxInputComponent;
use Nicat\HtmlFactory\Components\RadioInputComponent;
use Nicat\HtmlFactory\Elements\TextareaElement;
use Nicat\HtmlFactory\Components\HiddenInputComponent;
use Nicat\HtmlFactory\Components\FileInputComponent;
use Nicat\HtmlFactory\Components\MonthInputComponent;
use Nicat\HtmlFactory\Components\PasswordInputComponent;
use Nicat\HtmlFactory\Components\SearchInputComponent;
use Nicat\HtmlFactory\Components\RangeInputComponent;
use Nicat\HtmlFactory\Components\TelInputComponent;
use Nicat\HtmlFactory\Components\TimeInputComponent;
use Nicat\HtmlFactory\Components\WeekInputComponent;
use Nicat\HtmlFactory\Components\UrlInputComponent;
use Nicat\HtmlFactory\Elements\SmallElement;
use Nicat\HtmlFactory\Elements\SupElement;
use Nicat\HtmlFactory\Elements\ButtonElement;
use Nicat\HtmlFactory\Elements\SelectElement;
use Nicat\HtmlFactory\Elements\OptionElement;
use Nicat\HtmlFactory\Elements\OptgroupElement;
use Nicat\HtmlFactory\Components\SubmitButtonComponent;
use Nicat\HtmlFactory\Components\ResetButtonComponent;
use Nicat\HtmlFactory\Components\AlertComponent;
use Nicat\HtmlFactory\Components\PanelComponent;

/**
 * The main class of this package.
 * Provides (magic) factory methods for all HTML-elements and included Components.
 *
 * Class HtmlFactory
 * @package Nicat\HtmlFactory
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
        $elementClass = 'Nicat\\HtmlFactory\\Elements\\' . ucfirst($accessor) . 'Element';
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