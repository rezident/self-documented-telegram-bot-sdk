<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfSticker;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfString;

/**
 * Use this method to get information about custom emoji stickers by their identifiers. Returns an Array of
 * [Sticker](https://core.telegram.org/bots/api#sticker) objects.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#getcustomemojistickers
 */
class GetCustomEmojiStickersMethod implements ToArrayInterface
{
    private function __construct(private ArrayOfString $customEmojiIds)
    {
    }

    /**
     * @param ArrayOfString $customEmojiIds List of custom emoji identifiers. At most 200 custom emoji identifiers can
     *                                      be specified.
     */
    public static function new(ArrayOfString $customEmojiIds): self
    {
        return new self($customEmojiIds);
    }

    public function toArray(): array
    {
        $data = [
            'custom_emoji_ids' => $this->customEmojiIds,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): ArrayOfSticker
    {
        return ArrayOfSticker::fromArray($executor->execute($this));
    }
}
