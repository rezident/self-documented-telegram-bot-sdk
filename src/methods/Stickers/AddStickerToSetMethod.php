<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Stickers\InputSticker;

/**
 * Use this method to add a new sticker to a set created by the bot. The format of the added sticker must match the
 * format of the other stickers in the set. Emoji sticker sets can have up to 200 stickers. Animated and video sticker
 * sets can have up to 50 stickers. Static sticker sets can have up to 120 stickers. Returns *True* on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#addstickertoset
 */
class AddStickerToSetMethod implements ToArrayInterface
{
    private function __construct(private int $userId, private string $name, private InputSticker $sticker)
    {
    }

    /**
     * @param int $userId User identifier of sticker set owner
     * @param string $name Sticker set name
     * @param InputSticker $sticker A JSON-serialized object with information about the added sticker. If exactly the
     *                              same sticker had already been added to the set, then the set isn't changed.
     */
    public static function new(int $userId, string $name, InputSticker $sticker): self
    {
        return new self($userId, $name, $sticker);
    }

    public function toArray(): array
    {
        $data = [
            'user_id' => $this->userId,
            'name' => $this->name,
            'sticker' => $this->sticker,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
