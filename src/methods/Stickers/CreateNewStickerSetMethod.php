<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfInputSticker;

/**
 * Use this method to create a new sticker set owned by a user. The bot will be able to edit the sticker set thus
 * created. Returns *True* on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#createnewstickerset
 */
class CreateNewStickerSetMethod implements ToArrayInterface
{
    private ?string $stickerType = null;

    private ?bool $needsRepainting = null;

    private function __construct(
        private int $userId,
        private string $name,
        private string $title,
        private ArrayOfInputSticker $stickers,
        private string $stickerFormat
    ) {
    }

    /**
     * @param int $userId User identifier of created sticker set owner
     * @param string $name Short name of sticker set, to be used in `t.me/addstickers/` URLs (e.g., *animals*). Can
     *                     contain only English letters, digits and underscores. Must begin with a letter, can't
     *                     contain consecutive underscores and must end in `"_by_<bot_username>"`. `<bot_username>` is
     *                     case insensitive. 1-64 characters.
     * @param string $title Sticker set title, 1-64 characters
     * @param ArrayOfInputSticker $stickers A JSON-serialized list of 1-50 initial stickers to be added to the sticker
     *                                      set
     * @param string $stickerFormat Format of stickers in the set, must be one of “static”, “animated”, “video”
     */
    public static function new(
        int $userId,
        string $name,
        string $title,
        ArrayOfInputSticker $stickers,
        string $stickerFormat,
    ): self {
        return new self($userId, $name, $title, $stickers, $stickerFormat);
    }

    /**
     * Type of stickers in the set, pass “regular”, “mask”, or “custom\_emoji”. By default, a regular sticker set is
     * created.
     */
    public function stickerType(?string $stickerType): self
    {
        $this->stickerType = $stickerType;
        return $this;
    }

    /**
     * Pass *True* if stickers in the sticker set must be repainted to the color of text when used in messages, the
     * accent color if used as emoji status, white on chat photos, or another appropriate color based on context; for
     * custom emoji sticker sets only
     */
    public function needsRepainting(?bool $needsRepainting): self
    {
        $this->needsRepainting = $needsRepainting;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'user_id' => $this->userId,
            'name' => $this->name,
            'title' => $this->title,
            'stickers' => $this->stickers,
            'sticker_format' => $this->stickerFormat,
            'sticker_type' => $this->stickerType,
            'needs_repainting' => $this->needsRepainting,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
