<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;

/**
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfString extends ArrayOf
{
    public function current(): string
    {
        return parent::current();
    }

    public function add(string $value): static
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
        $instance->items = $array;

        return $instance;
    }
}
