<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;
use Rezident\SelfDocumentedTelegramBotSdk\types\Payments\ShippingOption;

/**
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfShippingOption extends ArrayOf
{
    public function current(): ShippingOption
    {
        return parent::current();
    }

    public function add(ShippingOption $value): static
    {
        $this->items[] = $value;
        return $this;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new static();
        $instance->items = array_map(fn($data) => ShippingOption::fromArray($data), $array);

        return $instance;
    }
}
