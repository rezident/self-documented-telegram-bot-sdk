<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfString;

/**
 * Use this method to change search keywords assigned to a regular or custom emoji sticker. The sticker must belong to a
 * sticker set created by the bot. Returns *True* on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setstickerkeywords
 */
class SetStickerKeywordsMethod implements ToArrayInterface
{
    private ?ArrayOfString $keywords = null;

    private function __construct(private string $sticker)
    {
    }

    /**
     * @param string $sticker File identifier of the sticker
     */
    public static function new(string $sticker): self
    {
        return new self($sticker);
    }

    /**
     * A JSON-serialized list of 0-20 search keywords for the sticker with total length of up to 64 characters
     */
    public function keywords(?ArrayOfString $keywords): self
    {
        $this->keywords = $keywords;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'sticker' => $this->sticker,
            'keywords' => $this->keywords,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
