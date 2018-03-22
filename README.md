# nicat/htmlfactory
**Convenient and powerful HTML-builder for Laravel 5.5**

## Description
This package provides functionality for building HTML in Laravel 5.5 without the need to write any HTML.

This package allows you to:
* Use static factory methods for all relevant HTML-elements.
* Chain fluid method-calls to set HTML-attributes (that are valid for the current element).
* Fully use the benefits of IDEs (auto-completion).
* Style output for specific frontend-frameworks using `Decorator`-Classes
* Keep your views frontend-framework-agnostic.
* Extend it's features using `Decorators` and `Components`.
* Produce accessibility-conform valid HTML 5 output.

This package is used as a foundation for [nicat/formbuilder](https://github.com/nic-at/formbuilder). Check out this package, if you want to create forms without much hassle in Laravel. 

## Installation
1. Require the package via composer:  `composer require nicat/htmlfactory`
2. Add the Service-Provider to config/app.php:  `Nicat\HtmlFactory\HtmlFactoryServiceProvider::class`
3. Add the Html-facade to config/app.php: `'Html' => Nicat\HtmlFactory\HtmlFactoryFacade::class`
4. Publish config:  `php artisan vendor:publish --provider="Nicat\HtmlFactory\HtmlFactoryServiceProvider"`
5. Set the `frontend_framework` configuration in the newly published config-file (situated at `app/config/htmlfactory.php`)

## Configuration
The package can be configured via `config/htmlfactory.php`. There is only one setting at the moment:
* `frontend_framework`: Set the frontend framework-id (and version) your website is using. As a result all corresponding decorators will be applied to the generated HTML-elements (e.g. 'bootstrap:3').

## Basic Concepts

Here are some definitions of basic concepts of this package to allow a better understanding of this document:

Concept | Description
-------|--------
**Element** | A classic HTML-element. Can either be a container (e.g. `<div></div>`) or an empty element (e.g. `<br />`). Each element is represented by a distinct class within the `Nicat\HtmlFactory\Elements`-namespace. Each element has a factory-method with the same name within the main `HtmlFactory` class (and thus also in the `Html` facade).
**Attribute** | An HTML-attribute of a HTML-element. (e.g. `class="myClass"`). Each attribute is represented by a distinct class within the `Nicat\HtmlFactory\Attributes`-namespace. Each attribute has a corresponding method within each `Element`-class it supports.
**Component** | A class, that is extending one of the `Element`-classes to create more complex HTML with attributes or content already set. An example would be the `TextInputComponent`, which has the attribute `type` set to `text` by default. Components can be registered with the `HtmlFactory`-service, so that they are accessible via the `Html` facade. They are one of the two main ways to extend `HtmlFactory`'s functionality (see section on `Components` below for further details).
**Decorator** | The second main way to customize your output. Decorators can be registered with the `HtmlFactory`-service to further manipulate a defined set of elements or components (and optionally for a certain frontend-framework and -version). This way you can for example add HTML-attributes, content or wrappers to all generated elements of a special kind. See special section on decorators below for more info.

Please note, that whenever this document uses the term `Element` it is meant to also include `Component`-classes (except if stated otherwise), since they are technically also `Element`-classes.

## Usage

### Basics

A HTML-element or component is generated using the corresponding method of the `Html-`facade, or by simply instantiating the corresponding `Element` or `Component` class. You can then manipulate the generated output by "chaining" fluent setter methods (e.g. to set attributes). The final HTML-string is generated using the `generate()`-method. But since the `Element`-class of the HtmlFactory-package includes a magic `__toString()`-method doing exactly that, you can omit the `generate()`-method when using the Html-facade in a blade-template.

#### A minimal example to create a element
Here is a very basic example for the generation of a `div`-element from within a laravel-blade-template:
```
Blade Code:
-----------
{!! Html::div() !!}

Generated HTML:
---------------
<div></div>
```
Since this package is built IDE-friendly way, you just have to type `Html::`in your auto-completion-enabled IDE and you should immediately get a list of available elements as well as the included components. (This auto-completion will of course not work with your own components.)

#### Using element-methods to change the output

Now let's say, we want change the output in the following way:
* add an `id`-attribute with value `myId`
* add a data-attribute `data-foo` with the value `bar`,
* add a `span`-element including the text `Hello world!` within the `div`-element.
* and wrap the whole element within another `div` element having the class `wrapper`.

We can achieve this by applying the corresponding methods for these modifications:

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
 !!}

Generated HTML:
---------------
<div class="wrapper">
    <div id="myId" data-foo="bar">
        <span>Hello world!</span>
    </div>
</div>
```
The methods, that can be applied to a element consist mainly of the HTML-attributes this element is allowed to have. As a rule-of-thumb, the methods to set HTML-attributes are identical to their name (e.g. the `id` attribute can be set with the `id()` method). Here are the exceptions to this rule:
* The setter-methods for attributes containing a hyphen (e.g. `accept-charset`) are the camelCased attribute-name (e.g. `acceptCharset()`).
* Attributes that can have multiple values have a corresponding method prefixed with `add` (and camelCased). An example would be `addClass()` for the `class` attribute (as used in the example above).
* `data`-attributes are set via the `data()`-method, which takes the data-attribute's suffix as it's first and the value as it's second parameter (as shown in the example above).

In addition to the methods corresponding to HTML-attributes, there are also the following methods to add child-, wrapper- or sibling-elements:

Method | Description
-------|--------
**appendContent**($content) | Appends a single child or an array of children within this element. A child can either be another `Element`-object or a simple text-string.
**content**($content) | Alias for `appendContent()`.
**prependContent**($content) | Prepends a single child or an array of children within this element (positioning them before all already existing content). A child can either be another `Element`-object or a simple text-string.
**insertAfter**($element) | Adds an element to be rendered as a sibling situated after this element. $element can either be another `Element`-object or a simple text-string.
**insertBefore**($element) | Adds an element to be rendered as a sibling situated before this element. $element can either be another `Element`-object or a simple text-string.
**wrap**($wrapper) | Wraps this element within another (Container)Element.

(Note that the content/child-related methods are only available for container-elements.)

Since this package is built in an IDE-friendly way, you just have to type e.g. `Html::text()->` in your auto-completion-enabled IDE and you should immediately get a list of available methods for this element.

And since this package strives to only output valid HTML, the available methods differ from element to element. E.g. you can not use the method ->selected() on an input-element, because it is not allowed according to HTML-standards.

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
    app(Nicat\HtmlFactory\HtmlFactory::class)->components->register(string $className, bool $force = false)
    ```
    Example:
    ```php
    app(Nicat\HtmlFactory\HtmlFactory::class)->components->register('FQCN\Of\My\AwesomeComponent')
    ```
  * Register components from the files in a directory.
    ```php
    app(Nicat\HtmlFactory\HtmlFactory::class)->components->registerFromFolder(string $namespace, string $folder, bool $force = false):
    ```
    Example:
    ```php
    app(Nicat\HtmlFactory\HtmlFactory::class)->components->registerFromFolder('Fully\Qualified\Namespace','/path/to/my/awesome_components'):
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

And of course you can also add additional fluid setters to be callable on the component in your views. The package already includes some traits, which provide some generic fluent setters and corresponding properties. You can find them at the namespace `Nicat\HtmlFactory\Components\Traits`. 

##### Examples

Let's take a look at the included `SubmitButtonComponent` as a very basic example:

```php
namespace Nicat\HtmlFactory\Components;

use Nicat\HtmlFactory\Components\Contracts\RegisteredComponentInterface;
use Nicat\HtmlFactory\Elements\ButtonElement;

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

The second way to customize HtmlFactory's output is by using decorators. Decorators are classes, that define themselves, which _Elements_ they are eligible to process. You can for example create a decorator, that adds a CSS-class to all ButtonElements. Decorators are also a great way to apply frontend-framework-specific modifications (e.g. add the `form-control`-class to field-elements when using bootstrap as the frontend-framework). The decorator itself can also state, which frontend-framework it supports and is then only used, if the `frontend_framework` config-string corresponds to this setting.

Decorators must expand the abstract class `Nicat\HtmlFactory\Decorators\Abstracts\Decorator`, forcing it to implement the following abstract methods:

Method | Description
-------|--------
**getSupportedFrameworks**() | Should return an array of frontend-framework-ids (e.g. 'bootstrap'). Optionally you can also specify the version prefixed with a colon (e.g. 'bootstrap:3'). The decorator will only be applied, if the current value for the config-setting `frontend_framework` is represented in this array. If you want the decorator to be applied regardless of the frontend-framework, simply return an empty array here.
**getSupportedElements**() | Should return an array of FQCNs of any element- or component-classes, that should be processed by this decorator. This also applies to all child-classes of the stated class-names. (E.g. If you return `Nicat\HtmlFactory\Elements\Abstact\Element` in this array, the decorator would be applied to ALL elements or components generated with HtmlFactory.
**decorate**() | This is the main method to perform the desired modifications to the element, which accessible via `$this->element`.

##### Registering Decorators

Decorators must be registered with the HtmlFactory-service by using one of the following methods:

  * Register a single (fully qualified) class-name as a decorator.
    ```php
    app(Nicat\HtmlFactory\HtmlFactory::class)->decorators->register(string $className)
    ```
    Example:
    ```php
    app(Nicat\HtmlFactory\HtmlFactory::class)->decorators->register('FQCN\Of\My\AwesomeDecorator')
    ```
  * Register decorators from the files in a directory.
    ```php
    app(Nicat\HtmlFactory\HtmlFactory::class)->decorators->registerFromFolder(string $namespace, string $folder):
    ```
    Example:
    ```php
    app(Nicat\HtmlFactory\HtmlFactory::class)->decorators->registerFromFolder('Fully\Qualified\Namespace','/path/to/my/awesome_decorators'):
    ```

As with components, the best location to perform these registrations is within the `boot()`-method of your `AppServiceProvider` (or any other ServiceProvider).

#### Examples

HtmlFactory already comes with some included decorators. Let's take at the `DecorateButtonElement`-class:

```php
use Nicat\HtmlFactory\Decorators\Abstracts\Decorator;
use Nicat\HtmlFactory\Elements\ButtonElement;

class DecorateButtonElement extends Decorator
{

    public static function getSupportedFrameworks(): array
    {
        return [
            'bootstrap:3'
        ];
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

It's functionality should be quite obvious. The decorator is only applied, if the current config `frontend_framework` is set to 'bootstrap:3'. Also it is only applied to elements or components that are identical to or descendants of `Nicat\HtmlFactory\Elements\ButtonElement`. It's function is to add the bootstrap-specific CSS-class 'btn' to buttons.

Check out the other included decorators for more examples!