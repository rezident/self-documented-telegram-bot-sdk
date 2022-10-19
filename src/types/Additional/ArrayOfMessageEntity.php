<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;
use Rezident\SelfDocumentedTelegramBotSdk\types\MessageEntity;

/**
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfMessageEntity extends ArrayOf
{
    public function current(): MessageEntity
    {
        return parent::current();
    }

    public function add(MessageEntity $value): static
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
        $instance->items = array_map(fn($data) => MessageEntity::fromArray($data), $array);

        return $instance;
    }
}
