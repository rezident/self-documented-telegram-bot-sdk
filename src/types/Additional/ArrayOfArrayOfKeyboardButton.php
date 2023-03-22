<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;

/**
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfArrayOfKeyboardButton extends ArrayOf
{
    public function current(): ArrayOfKeyboardButton
    {
        return parent::current();
    }

    public function add(ArrayOfKeyboardButton $value): static
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
        $instance->items = array_map(fn($data) => ArrayOfKeyboardButton::fromArray($data), $array);

        return $instance;
    }
}
