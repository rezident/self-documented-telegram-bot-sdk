<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;
use Rezident\SelfDocumentedTelegramBotSdk\types\Message;

/**
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfMessage extends ArrayOf
{
    public function current(): Message
    {
        return parent::current();
    }

    public function add(Message $value): static
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
        $instance->items = array_map(fn($data) => Message::fromArray($data), $array);

        return $instance;
    }
}
