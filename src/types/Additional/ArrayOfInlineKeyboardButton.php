<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineKeyboardButton;

/**
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfInlineKeyboardButton extends ArrayOf
{
    public function current(): InlineKeyboardButton
    {
        return parent::current();
    }

    public function add(InlineKeyboardButton $value): static
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
        $instance->items = array_map(fn($data) => InlineKeyboardButton::fromArray($data), $array);

        return $instance;
    }
}
