<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Describes that no specific value for the menu button was set.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#menubuttondefault
 */
class MenuButtonDefault implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private string $type)
    {
    }

    /**
     * @param string $type Type of the button, must be *default*
     */
    public static function new(string $type): self
    {
        return new self($type);
    }

    /**
     * Type of the button, must be *default*
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['type']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'type' => $this->type,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
