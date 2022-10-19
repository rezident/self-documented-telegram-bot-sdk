<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;
use Rezident\SelfDocumentedTelegramBotSdk\types\PollOption;

/**
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfPollOption extends ArrayOf
{
    public function current(): PollOption
    {
        return parent::current();
    }

    public function add(PollOption $value): static
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
        $instance->items = array_map(fn($data) => PollOption::fromArray($data), $array);

        return $instance;
    }
}
