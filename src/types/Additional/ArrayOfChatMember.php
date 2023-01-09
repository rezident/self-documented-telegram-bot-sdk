<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;
use Rezident\SelfDocumentedTelegramBotSdk\types\ChatMember;

/**
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfChatMember extends ArrayOf
{
    public function current(): ChatMember
    {
        return parent::current();
    }

    public function add(ChatMember $value): static
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
        $instance->items = array_map(fn($data) => ChatMember::fromArray($data), $array);

        return $instance;
    }
}
