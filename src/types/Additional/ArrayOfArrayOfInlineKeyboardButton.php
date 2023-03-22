<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;

/**
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfArrayOfInlineKeyboardButton extends ArrayOf
{
    public function current(): ArrayOfInlineKeyboardButton
    {
        return parent::current();
    }

    public function add(ArrayOfInlineKeyboardButton $value): static
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
        $instance->items = array_map(fn($data) => ArrayOfInlineKeyboardButton::fromArray($data), $array);

        return $instance;
    }
}
