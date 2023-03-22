<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;
use Rezident\SelfDocumentedTelegramBotSdk\types\Payments\LabeledPrice;

/**
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfLabeledPrice extends ArrayOf
{
    public function current(): LabeledPrice
    {
        return parent::current();
    }

    public function add(LabeledPrice $value): static
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
        $instance->items = array_map(fn($data) => LabeledPrice::fromArray($data), $array);

        return $instance;
    }
}
