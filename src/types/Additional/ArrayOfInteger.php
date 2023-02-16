<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;

/**
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfInteger extends ArrayOf
{
    public function current(): int
    {
        return parent::current();
    }

    public function add(int $value): static
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
