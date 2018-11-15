<?php

namespace Webflorist\HtmlFactory\Components;

use Webflorist\HtmlFactory\Components\Contracts\RegisteredComponentInterface;
use Webflorist\HtmlFactory\Components\Traits\HasContext;
use Webflorist\HtmlFactory\Components\Traits\IsDismissible;
use Webflorist\HtmlFactory\Elements\DivElement;

class AlertComponent extends DivElement implements RegisteredComponentInterface
{
    use HasContext,
        IsDismissible;

    /**
     * Alert constructor.
     *
     * @param string $context
     */
    public function __construct(string $context)
    {
        parent::__construct();
        $this->addRole('alert');
        $this->context($context);
    }

    /**
     * Returns the accessor, under which this component will be accessible.
     *
     * @return string
     */
    public static function getAccessor(): string
    {
        return 'alert';
    }
}