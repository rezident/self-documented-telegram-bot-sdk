<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;
use Rezident\SelfDocumentedTelegramBotSdk\types\KeyboardButton;

/**
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfKeyboardButton extends ArrayOf
{
    public function current(): KeyboardButton
    {
        return parent::current();
    }

    public function add(KeyboardButton $value): static
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
        $instance->items = array_map(fn($data) => KeyboardButton::fromArray($data), $array);

        return $instance;
    }
}
