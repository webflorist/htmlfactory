<?php

namespace HtmlFactoryTests\Traits;

use Webflorist\HtmlFactory\Elements\Abstracts\Element;
use Webflorist\HtmlFactory\Elements\ButtonElement;
use Webflorist\HtmlFactory\Elements\InputElement;
use ReflectionClass;

trait AppliesAttributeSets
{

    /**
     * Applies all global HTML-attributes.
     *
     * @param Element $element
     */
    protected function applyGeneralAttributes(Element $element)
    {
        $element
            ->id('myId')
            ->addAriaDescribedby("describedById")
            ->addClass('myFirstClass')
            ->addClass(function (Element $element){
                return 'mySecondClass';
            })
            ->data('my-first-data-attribute','myFirstDataAttributeValue')
            ->data('my-second-data-attribute',function (Element $element){
                if ($element->attributes->isset('data-my-first-data-attribute')) {
                    return 'mySecondDataAttributeValue';
                }
            })
            ->hidden(function (Element $element){
                return true;
            })
            ->addRole('myFirstRole')
            ->addRole('mySecondRole')
            ->addStyle('display:block')
            ->addStyle('color:black')
            ->title('My Title')
            ;
    }

    /**
     * Applies all non-global HTML-attributes valid for all InputElements.
     *
     * @param InputElement $element
     */
    protected function applyInputAttributes(InputElement $element)
    {
        $element
            ->ariaInvalid('true')
            ->autofocus(true)
            ->disabled(true)
            ->name('myFieldName')
            ->readonly(true)
            ->required(true)
            ->value('myValue')
        ;
    }

    /**
     * Applies all non-global HTML-attributes valid for all ButtonElements.
     *
     * @param ButtonElement $element
     */
    protected function applyButtonAttributes(ButtonElement $element)
    {
        $element
            ->autofocus(true)
            ->disabled(true)
            ->name('myButtonName')
            ->value('myValue')
            ->content('This is a button.')
        ;
    }

    /**
     * Applies the corresponding view.
     *
     * @param Element $element
     */
    protected function applyCorrespondingView(Element $element)
    {
        try {
            $type = current(array_reverse(explode('/',dirname((new ReflectionClass($this))->getFileName()))));
            $element->view($type.'TestViews::'.$element->getName());
        } catch (\ReflectionException $e) {
        }
    }

}