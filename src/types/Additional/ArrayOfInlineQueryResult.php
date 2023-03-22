<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode\InlineQueryResult;

/**
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfInlineQueryResult extends ArrayOf
{
    public function current(): InlineQueryResult
    {
        return parent::current();
    }

    public function add(InlineQueryResult $value): static
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
        $instance->items = array_map(fn($data) => InlineQueryResult::fromArray($data), $array);

        return $instance;
    }
}
