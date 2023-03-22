<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to change the bot's short description, which is shown on the bot's profile page and is sent together
 * with the link when users share the bot. Returns *True* on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setmyshortdescription
 */
class SetMyShortDescriptionMethod implements ToArrayInterface
{
    private ?string $shortDescription = null;

    private ?string $languageCode = null;

    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    /**
     * New short description for the bot; 0-120 characters. Pass an empty string to remove the dedicated short
     * description for the given language.
     */
    public function shortDescription(?string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }

    /**
     * A two-letter ISO 639-1 language code. If empty, the short description will be applied to all users for whose
     * language there is no dedicated short description.
     */
    public function languageCode(?string $languageCode): self
    {
        $this->languageCode = $languageCode;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'short_description' => $this->shortDescription,
            'language_code' => $this->languageCode,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
