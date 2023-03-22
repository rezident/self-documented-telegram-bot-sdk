<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to change the bot's description, which is shown in the chat with the bot if the chat is empty.
 * Returns *True* on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setmydescription
 */
class SetMyDescriptionMethod implements ToArrayInterface
{
    private ?string $description = null;

    private ?string $languageCode = null;

    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    /**
     * New bot description; 0-512 characters. Pass an empty string to remove the dedicated description for the given
     * language.
     */
    public function description(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * A two-letter ISO 639-1 language code. If empty, the description will be applied to all users for whose language
     * there is no dedicated description.
     */
    public function languageCode(?string $languageCode): self
    {
        $this->languageCode = $languageCode;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'description' => $this->description,
            'language_code' => $this->languageCode,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
