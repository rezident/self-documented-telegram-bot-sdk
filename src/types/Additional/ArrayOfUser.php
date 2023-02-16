<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;
use Rezident\SelfDocumentedTelegramBotSdk\types\User;

/**
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfUser extends ArrayOf
{
    public function current(): User
    {
        return parent::current();
    }

    public function add(User $value): static
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
        $instance->items = array_map(fn($data) => User::fromArray($data), $array);

        return $instance;
    }
}
