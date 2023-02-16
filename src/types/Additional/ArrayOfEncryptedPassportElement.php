<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;
use Rezident\SelfDocumentedTelegramBotSdk\types\TelegramPassport\EncryptedPassportElement;

/**
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfEncryptedPassportElement extends ArrayOf
{
    public function current(): EncryptedPassportElement
    {
        return parent::current();
    }

    public function add(EncryptedPassportElement $value): static
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
        $instance->items = array_map(fn($data) => EncryptedPassportElement::fromArray($data), $array);

        return $instance;
    }
}
