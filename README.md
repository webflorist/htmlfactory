# webflorist/htmlfactory
**Convenient and powerful HTML-builder for Laravel 5.5 and later**

## Description
This package provides functionality for building HTML in Laravel without the need to write any HTML.

This package allows you to:
* Use static factory methods for all relevant HTML-elements.
* Chain fluent method-calls to set HTML-attributes (that are valid for the current element).
* Fully use the benefits of IDEs (auto-completion).
* Style output for specific frontend-frameworks using `Decorator`-Classes
* Keep your views frontend-agnostic.
* Extend it's features using `Decorators` and `Components`.
* Produce accessibility-conform valid HTML 5 output.

This package is used as a foundation for [webflorist/formfactory](https://github.com/webflorist/formfactory). Check out this package, if you want to create forms without much hassle in Laravel. 

## Installation
1. Require the package via composer:  `composer require webflorist/htmlfactory`
2. Publish config:  `php artisan vendor:publish --provider="Webflorist\HtmlFactory\HtmlFactoryServiceProvider"`
3. Set the `decorators` configuration in the newly published config-file (situated at `app/config/htmlfactory.php`).

Note that this package is configured for automatic discovery for Laravel. Thus the package's Service Provider `Webflorist\HtmlFactory\HtmlFactoryServiceProvider` and the `Html`-Facade `Webflorist\HtmlFactory\HtmlFactoryFacade` will be automatically registered with Laravel.

## Configuration
The package can be configured via `config/htmlfactory.php`. There is only one setting at the moment:
* `decorators`: Set the group-IDs of the decorators, that should be loaded. As a result all corresponding decorators will be applied to the generated HTML-elements (e.g. 'bootstrap:v3').

## Basic Concepts

Here are some definitions of basic concepts of this package to allow a better understanding of this document:

Concept | Description
-------|--------
**Element** | A classic HTML-element. Can either be a container (e.g. `<div></div>`) or an empty element (e.g. `<br />`). Each element is represented by a distinct class within the `Webflorist\HtmlFactory\Elements`-namespace. Each element has a factory-method with the same name within the main `HtmlFactory` class (and thus also in the `Html` facade).
**Attribute** | An HTML-attribute of a HTML-element. (e.g. `class="myClass"`). Each attribute is represented by a distinct class within the `Webflorist\HtmlFactory\Attributes`-namespace. Each attribute has a corresponding method within each `Element`-class it supports.
**Component** | A class, that is extending one of the `Element`-classes to create more complex HTML with attributes or content already set. An example would be the `TextInputComponent`, which has the attribute `type` set to `text` by default. Components can be registered with the `HtmlFactory`-service, so that they are accessible via the `Html` facade. They are one of the two main ways to extend `HtmlFactory`'s functionality (see section on `Components` below for further details).
**Decorator** | The second main way to customize your output. Decorators can be registered with the `HtmlFactory`-service to further manipulate a defined set of elements or components. This way you can for example add HTML-attributes, content or wrappers to all generated elements of a special kind. See special section on decorators below for more info.

Please note, that whenever this document uses the term `Element` it is meant to also include `Component`-classes (except if stated otherwise), since they are technically also `Element`-classes.

## Usage

A HTML-element or component is generated using the corresponding method of the `Html-`facade, or by simply instantiating the corresponding `Element` or `Component` class.
 
Since this package is built IDE-friendly way, you just have to type `Html::`in your auto-completion-enabled IDE and you should immediately get a list of available elements as well as the included components. (This auto-completion will of course not work with your own components.)

The final HTML-string is generated using the `generate()`-method. But since the `Element`-class of the HtmlFactory-package includes a magic `__toString()`-method doing exactly that, you can omit the `generate()`-method when using the Html-facade in a blade-template.

### Basic example

Here is a very basic example for the generation of a `div`-element from within a laravel-blade-template:

```
Blade Code:
-----------
{!! Html::div() !!}

Generated HTML:
---------------
<div></div>
```

### Modifying the Element using fluent methods

Further modifications (e.g. adding HTML-attributes or content) can be made by chaining various fluent methods of the Element. In your auto-completion-enabled you just have to type e.g. `Html::div()->` and you should immediately get a list of available methods for this element. Here is an overview of the provided methods:

#### Adding HTML-attributes

Now let's say, we want add some HTML-attributes to the Element:
* an `id`-attribute with value `myId`
* a data-attribute `data-foo` with the value `bar`
* a class called `myClass`

We can achieve this by applying the corresponding methods for these modifications:

```
Blade Code:
-----------
{!! Html::div()
    ->id('myId')
    ->data('foo','bar')
    ->addClass('myClass')
 !!}

Generated HTML:
---------------
<div id="myId" data-foo="bar" class="myClass">
    <span>Hello world!</span>
</div>
```

As a rule-of-thumb, the methods to set HTML-attributes are identical to their name (e.g. the `id` attribute can be set with the `id()` method). Here are the exceptions to this rule:
* The setter-methods for attributes containing a hyphen (e.g. `accept-charset`) are the camelCased attribute-name (e.g. `acceptCharset()`).
* Attributes that can have multiple values have a corresponding method prefixed with `add` (and camelCased). An example would be `addClass()` for the `class` attribute (as used in the example above).
* `data`-attributes are set via the `data()`-method, which takes the data-attribute's suffix as it's first and the value as it's second parameter (as shown in the example above).

Note that since this package strives to only output valid HTML, the available methods differ from element to element. E.g. you can not use the method `selected()` on an div-element, because it is not allowed according to HTML-standards.

Values for all HTML-attributes can also be Closures. The Closures get handled the Element-object itself as it's only parameter. Here is an example:

```
Blade Code:
-----------
{!! Html::div()
    ->id('myId')
    ->title(
        function ($element) {
            return "This div's id is ".$element->attributes->id;
        }
    )
 !!}

Generated HTML:
---------------
<div id="myId" title="The ID of this div is myId"></div>
```

##### Adding Vue-Directives

In addition to standard HTMl-attributes, you can also set [all possible Vue directives](https://vuejs.org/v2/api/#Directives) via corresponding element-methods:

Method | Vue Directive
-------|--------
**vText**(string $text) | v-text
**vHtml**(string $html) | v-html
**vShow**(string $expression) | v-show
**vIf**(string $expression) | v-if
**vElse**() | v-else
**vElseIf**(string $expression) | v-else-if
**vFor**(string expression) | v-for
**vOn**($argument, string $expression, array $modifiers=[]) | v-on
**vBind**($argument, string $expression, array $modifiers=[]) | v-bind
**vPre**() | v-pre
**vCloak**() | v-cloak
**vOnce**() | v-once
**vCustom**(string $name, $argument=null, string $expression=null, array $modifiers=[]) | Custom Vue directive with name $name

Furthermore shortcut-methods for `vOn()` are provided for the most common DOM events:

Method | Vue Directive
-------|--------
**vOnClick**(string $expression, array $modifiers=[]) | v-on:click
**vOnChange**(string $expression, array $modifiers=[]) | v-on:change
**vOnMouseOver**(string $expression, array $modifiers=[]) | v-on:mouseover
**vOnMouseOut**(string $expression, array $modifiers=[]) | v-on:mouseout
**vOnKeyDown**(string $expression, array $modifiers=[]) | v-on:keydown
**vOnKeyUp**(string $expression, array $modifiers=[]) | v-on:keyup
**vOnLoad**(string $expression, array $modifiers=[]) | v-on:load

#### Adding Content

Of course ContainerElements can also have content.  Let's look at this example:

```
Blade Code:
-----------
{!! Html::div()
    ->content([
        Html::span()->content('Hello world!'),
        "What's up?"
    ])
 !!}

Generated HTML:
---------------
<div>
    <span>Hello world!</span>
    What's up?
</div>
```

The `content()` method takes a single child or an array of children as it's parameter. A child can either be another `Element`-object or a simple text-string.
There are also the additional methods `prependContent()` and `appendContent()`, which adds content prior or after already existing content. Here is an overview of all content-related methods:

Method | Description
-------|--------
**appendContent**($content) | Appends a single child or an array of children within this element. A child can either be another `Element`-object or a simple text-string.
**content**($content) | Alias for `appendContent()`.
**prependContent**($content) | Prepends a single child or an array of children within this element (positioning them before all already existing content). A child can either be another `Element`-object or a simple text-string.

#### Inserting a sibling before or after the Element

The following methods allow you to insert a sibling (either plain-text or another `Element`) before or after the Element.

Method | Description
-------|--------
**insertAfter**($element) | Adds an element to be rendered as a sibling situated after this element. $element can either be another `Element`-object or a simple text-string.
**insertBefore**($element) | Adds an element to be rendered as a sibling situated before this element. $element can either be another `Element`-object or a simple text-string.

#### Wrapping an Element within another Element.

You can also apply a wrapper to an Element. Take a look at this example:

```
Blade Code:
-----------
{!! Html::div()
    ->id('myDivElement')
    ->wrap(
        Html::div()->addClass('wrapper')
    )
 !!}

Generated HTML:
---------------
<div class="wrapper">
    <div id="myDivElement"></div>
</div>
```

##### Applying a Blade-View to render the Element

You can also apply Blade-Views to your Elements using the `view()` method. The Element itself is available in the view as `$el`. To render it, call `$el->renderHtml()`.

Here is an example:

```
Blade Code:
-----------
{!! Html::div()
    ->content('Hello World!')
    ->view('my-view')
!!}
 
 
my-view.blade.php:
-----------
<div class="my-view-wrapper">
    before element
    {!! $el->renderHtml() !!}
    after element    
</div>

Generated HTML:
---------------
<div class="my-view-wrapper">
    before element
    <div>Hello World!</div>
    after element
</div>
```

##### Closure Decorators

Sometimes you may with to apply some complex decorations to a single element, or influence the Element after the global Decorator-Classes (see description below) were applied.
You can use the Element-method `decorate()` for this. The method takes a Closure for it's only parameter and the Closure gets handed the Element itself as it's only attribtues

Check out this example:

```
Blade Code:
-----------
{!! Html::div()
    ->id('myId')
    ->data('foo','bar')
    ->content(
        Html::span()->content('Hello world!')
    )
    ->wrap(
        Html::div()->addClass('wrapper')
    )
    ->decorate( function($element) {
        $element
            ->id('myDecoratedId')
            ->data('decorated-foo','decorated-bar')
            ->appendContent("What's up?");
        $element->wrapper->addClass('decoratedWrapper');
    })
 !!}

Generated HTML:
---------------
<div class="wrapper decoratedWrapper">
    <div id="myDecoratedId" data-foo="bar" data-decorated-foor="decorated-bar">
        <span>Hello world!</span>
        What's up?
    </div>
</div>
```

### Extendability

#### Components

There are cases, where you quickly want to create more complex HTML-elements, that already have certain attributes, content or wrappers preset, provide additional methods or even required certain construction-parameters. You might also want to make this component accessible via the `Html`-facade (e.g. via `Html::myCustomComponent()`). This can all be achieved by creating `Components`.

A component is basically a class, that extends one of the `Element`-classes or another `Component` class. There are already several components included in the `Components` folder. These include extensions of the `InputElement` as well as the `ButtonElement` to provide components for each of the possible 'types'.

##### Registering Components

For a component to be creatable with the `Html`-facade, the following conditions must be fulfilled:
* The component must implement the `RegisteredComponentInterface` enforcing the presence of the static `getAccessor()`-method, which should return the desired method-name, under which this component can be created via the `Html`-facade.
* The component must be registered with the `HtmlFactory`-service.

Registration is done by using one of the following methods:

  * Register a single (fully qualified) class-name as a component.
    ```php
    app(Webflorist\HtmlFactory\HtmlFactory::class)->components->register(string $className, bool $force = false)
    ```
    Example:
    ```php
    app(Webflorist\HtmlFactory\HtmlFactory::class)->components->register('FQCN\Of\My\AwesomeComponent')
    ```
  * Register components from the files in a directory.
    ```php
    app(Webflorist\HtmlFactory\HtmlFactory::class)->components->registerFromFolder(string $namespace, string $folder, bool $force = false):
    ```
    Example:
    ```php
    app(Webflorist\HtmlFactory\HtmlFactory::class)->components->registerFromFolder('Fully\Qualified\Namespace','/path/to/my/awesome_components'):
    ```
    
Regarding the `$force`-parameter: Normally HtmlFactory will throw an error, if another component is already installed with the same accessor. This can be circumvented by setting `$force` to true. (This way you can also overrule the included components.)

The best location to perform these registrations is within the `boot()`-method of your `AppServiceProvider` (or any other ServiceProvider).

Note that you don't need to implement the `RegisteredComponentInterface` or register the component, if you don't intend to make it instantiable via the `Html`-facade (e.g. if you use it with your own Service/Facade or instantiate the object with the `new` keyword). 

##### Customizing components.

To customize your component, you can implement the following hook-methods:

Method | Description
-------|--------
**setUp**() | Gets called during construction. Any customization (like the default-setting of an attribute) can still be overridden by method-calls on the Element-object in your view.
**beforeDecoration**() | Gets called immediately after `generate()` is called and before decorators are applied. Thus any customization you put here cannot be overridden by method-calls on the Element-object in your view, but can be modified/utilized by decorators.
**afterDecoration**() | Gets called after applying decorators. As a result any modifications you put here cannot be further customized by decorators.
**afterChildrenDecoration**() | (Only possible with `ContainerElements`.) Gets called after applying decorators to child-elements. This is useful, if you want to make changes to an element's children or the element itself after the children were decorated.
**manipulateOutput**(string &$output) | This hook-method get's the final rendered HTML-output passed by reference. You can make any final changes to the output-string.

(Be sure to call the parent-methods too if you overwrite these methods, especially when extending other components, so no functionality gets lost.)

Of course you can also create your own constructor (for example to add mandatory parameters). Just be sure to call the parent's constructor.

And of course you can also add additional fluent setters to be callable on the component in your views. The package already includes some traits, which provide some generic fluent setters and corresponding properties. You can find them at the namespace `Webflorist\HtmlFactory\Components\Traits`. 

##### Examples

Let's take a look at the included `SubmitButtonComponent` as a very basic example:

```php
namespace Webflorist\HtmlFactory\Components;

use Webflorist\HtmlFactory\Components\Contracts\RegisteredComponentInterface;
use Webflorist\HtmlFactory\Elements\ButtonElement;

class SubmitButtonComponent extends ButtonElement implements RegisteredComponentInterface
{

    protected function setUp()
    {
        parent::setUp();
        $this->type('submit');
    }

    static function getAccessor(): string
    {
        return 'submitButton';
    }

}
```

The component implements the `setUp()`-method to set the attribute `type` to `submit` by default. Furthermore it also implements the `RegisteredComponentInterface` and defines `submitButton` as it's accessor. (Additionally all included components are registered within the `boot`-method of the `HtmlFactoryServiceProvider`.) 

This enables the following usage:

```
Blade Code:
-----------
{!! Html::submitButton() !!}

Generated HTML:
---------------
<button type="submit"></button>
```

The output of `Html::submitButton()` is thus identical to `Html::button()->type('submit')`.

Check out the other included components for more examples!

#### Decorators

The second way to customize HtmlFactory's output is by using decorators. Decorators are classes, that define themselves, which _Elements_ they are eligible to process. You can for example create a decorator, that adds a CSS-class to all ButtonElements. Decorators are also a great way to apply frontend-framework-specific modifications (e.g. add the `form-control`-class to field-elements when using bootstrap as the frontend-framework). The decorator itself can also state a group-ID, which results in the decorator only getting applied, if it's group-ID is present in the `decorators` config-string.

Decorators must expand the abstract class `Webflorist\HtmlFactory\Decorators\Abstracts\Decorator`, forcing it to implement the following abstract methods:

Method | Description
-------|--------
**getGroupId**() | Should return a string (e.g. 'bootstrap:v3'). The decorator will only be applied, if it's group-ID is present in the config-setting `decorators`. If you want the decorator to be applied regardless this config, simply return `null` here.
**getSupportedElements**() | Should return an array of FQCNs of any element- or component-classes, that should be processed by this decorator. This also applies to all child-classes of the stated class-names. (E.g. If you return `Webflorist\HtmlFactory\Elements\Abstact\Element` in this array, the decorator would be applied to ALL elements or components generated with HtmlFactory.
**decorate**() | This is the main method to perform the desired modifications to the element, which accessible via `$this->element`.

##### Registering Decorators

Decorators must be registered with the HtmlFactory-service by using one of the following methods:

  * Register a single (fully qualified) class-name as a decorator.
    ```php
    app(Webflorist\HtmlFactory\HtmlFactory::class)->decorators->register(string $className)
    ```
    Example:
    ```php
    app(Webflorist\HtmlFactory\HtmlFactory::class)->decorators->register('FQCN\Of\My\AwesomeDecorator')
    ```
  * Register decorators from the files in a directory.
    ```php
    app(Webflorist\HtmlFactory\HtmlFactory::class)->decorators->registerFromFolder(string $namespace, string $folder):
    ```
    Example:
    ```php
    app(Webflorist\HtmlFactory\HtmlFactory::class)->decorators->registerFromFolder('Fully\Qualified\Namespace','/path/to/my/awesome_decorators'):
    ```

As with components, the best location to perform these registrations is within the `boot()`-method of your `AppServiceProvider` (or any other ServiceProvider).

##### Examples

HtmlFactory already comes with some included decorators. Let's take at the `DecorateButtonElement`-class:

```php
use Webflorist\HtmlFactory\Decorators\Abstracts\Decorator;
use Webflorist\HtmlFactory\Elements\ButtonElement;

class DecorateButtonElement extends Decorator
{

    public static function getGroupId()
    {
        return 'bootstrap:v3';
    }

    public static function getSupportedElements(): array
    {
        return [
            ButtonElement::class
        ];
    }

    public function decorate()
    {
        $this->element->addClass('btn');

    }
}
```

It's functionality should be quite obvious. The decorator is only applied, if 'bootstrap:3' is present in the current config `htmlfactory.decorators`. Also it is only applied to elements or components that are identical to or descendants of `Webflorist\HtmlFactory\Elements\ButtonElement`. It's function is to add the bootstrap-specific CSS-class 'btn' to buttons.

Check out the other included decorators for more examples!