<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;
use Rezident\SelfDocumentedTelegramBotSdk\types\Stickers\Sticker;

/**
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfSticker extends ArrayOf
{
    public function current(): Sticker
    {
        return parent::current();
    }

    public function add(Sticker $value): static
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
        $instance->items = array_map(fn($data) => Sticker::fromArray($data), $array);

        return $instance;
    }
}
