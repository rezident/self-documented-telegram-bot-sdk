<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\InputFile;

/**
 * Use this method to set the thumbnail of a regular or mask sticker set. The format of the thumbnail file must match
 * the format of the stickers in the set. Returns *True* on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setstickersetthumbnail
 */
class SetStickerSetThumbnailMethod implements ToArrayInterface
{
    private InputFile|string|null $thumbnail = null;

    private function __construct(private string $name, private int $userId)
    {
    }

    /**
     * @param string $name Sticker set name
     * @param int $userId User identifier of the sticker set owner
     */
    public static function new(string $name, int $userId): self
    {
        return new self($name, $userId);
    }

    /**
     * A **.WEBP** or **.PNG** image with the thumbnail, must be up to 128 kilobytes in size and have a width and
     * height of exactly 100px, or a **.TGS** animation with a thumbnail up to 32 kilobytes in size (see
     * [](https://core.telegram.org/stickers#animated-sticker-requirements)<https://core.telegram.org/stickers#animated-sticker-requirements>
     * for animated sticker technical requirements), or a **WEBM** video with the thumbnail up to 32 kilobytes in size;
     * see
     * [](https://core.telegram.org/stickers#video-sticker-requirements)<https://core.telegram.org/stickers#video-sticker-requirements>
     * for video sticker technical requirements. Pass a *file\_id* as a String to send a file that already exists on
     * the Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new
     * one using multipart/form-data.
     * [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files). Animated and video
     * sticker set thumbnails can't be uploaded via HTTP URL. If omitted, then the thumbnail is dropped and the first
     * sticker is used as the thumbnail.
     */
    public function thumbnail(InputFile|string|null $thumbnail): self
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'name' => $this->name,
            'user_id' => $this->userId,
            'thumbnail' => $this->thumbnail,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
