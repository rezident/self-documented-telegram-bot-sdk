<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to set the thumbnail of a custom emoji sticker set. Returns *True* on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setcustomemojistickersetthumbnail
 */
class SetCustomEmojiStickerSetThumbnailMethod implements ToArrayInterface
{
    private ?string $customEmojiId = null;

    private function __construct(private string $name)
    {
    }

    /**
     * @param string $name Sticker set name
     */
    public static function new(string $name): self
    {
        return new self($name);
    }

    /**
     * Custom emoji identifier of a sticker from the sticker set; pass an empty string to drop the thumbnail and use
     * the first sticker as the thumbnail.
     */
    public function customEmojiId(?string $customEmojiId): self
    {
        $this->customEmojiId = $customEmojiId;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'name' => $this->name,
            'custom_emoji_id' => $this->customEmojiId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
