<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\InputFile;
use Rezident\SelfDocumentedTelegramBotSdk\types\Stickers\MaskPosition;

/**
 * Use this method to create a new sticker set owned by a user. The bot will be able to edit the sticker set thus
 * created. You **must** use exactly one of the fields *png\_sticker*, *tgs\_sticker*, or *webm\_sticker*. Returns
 * *True* on success.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#createnewstickerset
 */
class CreateNewStickerSetMethod implements ToArrayInterface
{
    private InputFile|string|null $pngSticker = null;

    private ?InputFile $tgsSticker = null;

    private ?InputFile $webmSticker = null;

    private ?string $stickerType = null;

    private ?MaskPosition $maskPosition = null;

    private function __construct(
        private int $userId,
        private string $name,
        private string $title,
        private string $emojis
    ) {
    }

    /**
     * @param int $userId User identifier of created sticker set owner
     * @param string $name Short name of sticker set, to be used in `t.me/addstickers/` URLs (e.g., *animals*). Can
     *                     contain only English letters, digits and underscores. Must begin with a letter, can't
     *                     contain consecutive underscores and must end in `"_by_<bot_username>"`. `<bot_username>` is
     *                     case insensitive. 1-64 characters.
     * @param string $title Sticker set title, 1-64 characters
     * @param string $emojis One or more emoji corresponding to the sticker
     */
    public static function new(int $userId, string $name, string $title, string $emojis): self
    {
        return new self($userId, $name, $title, $emojis);
    }

    /**
     * **PNG** image with the sticker, must be up to 512 kilobytes in size, dimensions must not exceed 512px, and
     * either width or height must be exactly 512px. Pass a *file\_id* as a String to send a file that already exists
     * on the Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a
     * new one using multipart/form-data.
     * [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files)
     */
    public function pngSticker(InputFile|string|null $pngSticker): self
    {
        $this->pngSticker = $pngSticker;
        return $this;
    }

    /**
     * **TGS** animation with the sticker, uploaded using multipart/form-data. See
     * [](https://core.telegram.org/stickers#animated-sticker-requirements)<https://core.telegram.org/stickers#animated-sticker-requirements>
     * for technical requirements
     */
    public function tgsSticker(?InputFile $tgsSticker): self
    {
        $this->tgsSticker = $tgsSticker;
        return $this;
    }

    /**
     * **WEBM** video with the sticker, uploaded using multipart/form-data. See
     * [](https://core.telegram.org/stickers#video-sticker-requirements)<https://core.telegram.org/stickers#video-sticker-requirements>
     * for technical requirements
     */
    public function webmSticker(?InputFile $webmSticker): self
    {
        $this->webmSticker = $webmSticker;
        return $this;
    }

    /**
     * Type of stickers in the set, pass “regular” or “mask”. Custom emoji sticker sets can't be created via the Bot
     * API at the moment. By default, a regular sticker set is created.
     */
    public function stickerType(?string $stickerType): self
    {
        $this->stickerType = $stickerType;
        return $this;
    }

    /**
     * A JSON-serialized object for position where the mask should be placed on faces
     */
    public function maskPosition(?MaskPosition $maskPosition): self
    {
        $this->maskPosition = $maskPosition;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'user_id' => $this->userId,
            'name' => $this->name,
            'title' => $this->title,
            'png_sticker' => $this->pngSticker,
            'tgs_sticker' => $this->tgsSticker,
            'webm_sticker' => $this->webmSticker,
            'sticker_type' => $this->stickerType,
            'emojis' => $this->emojis,
            'mask_position' => $this->maskPosition,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
