<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\BotShortDescription;

/**
 * Use this method to get the current bot short description for the given user language. Returns
 * [BotShortDescription](https://core.telegram.org/bots/api#botshortdescription) on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#getmyshortdescription
 */
class GetMyShortDescriptionMethod implements ToArrayInterface
{
    private ?string $languageCode = null;

    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    /**
     * A two-letter ISO 639-1 language code or an empty string
     */
    public function languageCode(?string $languageCode): self
    {
        $this->languageCode = $languageCode;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'language_code' => $this->languageCode,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): BotShortDescription
    {
        return BotShortDescription::fromArray($executor->execute($this));
    }
}
