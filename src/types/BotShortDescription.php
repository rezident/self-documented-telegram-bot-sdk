<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents the bot's short description.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#botshortdescription
 */
class BotShortDescription implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private string $shortDescription)
    {
    }

    /**
     * @param string $shortDescription The bot's short description
     */
    public static function new(string $shortDescription): self
    {
        return new self($shortDescription);
    }

    /**
     * The bot's short description
     */
    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['short_description']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'short_description' => $this->shortDescription,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
