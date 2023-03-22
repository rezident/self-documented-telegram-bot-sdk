<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfString;

/**
 * Use this method to change the list of emoji assigned to a regular or custom emoji sticker. The sticker must belong to
 * a sticker set created by the bot. Returns *True* on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setstickeremojilist
 */
class SetStickerEmojiListMethod implements ToArrayInterface
{
    private function __construct(private string $sticker, private ArrayOfString $emojiList)
    {
    }

    /**
     * @param string $sticker File identifier of the sticker
     * @param ArrayOfString $emojiList A JSON-serialized list of 1-20 emoji associated with the sticker
     */
    public static function new(string $sticker, ArrayOfString $emojiList): self
    {
        return new self($sticker, $emojiList);
    }

    public function toArray(): array
    {
        $data = [
            'sticker' => $this->sticker,
            'emoji_list' => $this->emojiList,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
