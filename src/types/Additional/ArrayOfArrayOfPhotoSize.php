<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;

/**
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfArrayOfPhotoSize extends ArrayOf
{
    public function current(): ArrayOfPhotoSize
    {
        return parent::current();
    }

    public function add(ArrayOfPhotoSize $value): static
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
        $instance->items = array_map(fn($data) => ArrayOfPhotoSize::fromArray($data), $array);

        return $instance;
    }
}
