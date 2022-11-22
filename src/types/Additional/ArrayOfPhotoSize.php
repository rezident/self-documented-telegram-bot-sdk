<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;
use Rezident\SelfDocumentedTelegramBotSdk\types\PhotoSize;

/**
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfPhotoSize extends ArrayOf
{
    public function current(): PhotoSize
    {
        return parent::current();
    }

    public function add(PhotoSize $value): static
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
        $instance->items = array_map(fn($data) => PhotoSize::fromArray($data), $array);

        return $instance;
    }
}
