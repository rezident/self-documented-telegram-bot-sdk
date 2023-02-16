<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;
use Rezident\SelfDocumentedTelegramBotSdk\types\GettingUpdates\Update;

/**
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfUpdate extends ArrayOf
{
    public function current(): Update
    {
        return parent::current();
    }

    public function add(Update $value): static
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
        $instance->items = array_map(fn($data) => Update::fromArray($data), $array);

        return $instance;
    }
}
