<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;
use Rezident\SelfDocumentedTelegramBotSdk\types\Games\GameHighScore;

/**
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfGameHighScore extends ArrayOf
{
    public function current(): GameHighScore
    {
        return parent::current();
    }

    public function add(GameHighScore $value): static
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
        $instance->items = array_map(fn($data) => GameHighScore::fromArray($data), $array);

        return $instance;
    }
}
