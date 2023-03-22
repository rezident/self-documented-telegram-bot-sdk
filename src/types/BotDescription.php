<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents the bot's description.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#botdescription
 */
class BotDescription implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private string $description)
    {
    }

    /**
     * @param string $description The bot's description
     */
    public static function new(string $description): self
    {
        return new self($description);
    }

    /**
     * The bot's description
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['description']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'description' => $this->description,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
