<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\InputFile;

/**
 * Use this method to set the thumbnail of a sticker set. Animated thumbnails can be set for animated sticker sets only.
 * Video thumbnails can be set only for video sticker sets only. Returns *True* on success.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setstickersetthumb
 */
class SetStickerSetThumbMethod implements ToArrayInterface
{
    private InputFile|string|null $thumb = null;

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
     * A **PNG** image with the thumbnail, must be up to 128 kilobytes in size and have width and height exactly 100px,
     * or a **TGS** animation with the thumbnail up to 32 kilobytes in size; see
     * [](https://core.telegram.org/stickers#animated-sticker-requirements)<https://core.telegram.org/stickers#animated-sticker-requirements>
     * for animated sticker technical requirements, or a **WEBM** video with the thumbnail up to 32 kilobytes in size;
     * see
     * [](https://core.telegram.org/stickers#video-sticker-requirements)<https://core.telegram.org/stickers#video-sticker-requirements>
     * for video sticker technical requirements. Pass a *file\_id* as a String to send a file that already exists on
     * the Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new
     * one using multipart/form-data.
     * [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files). Animated sticker set
     * thumbnails can't be uploaded via HTTP URL.
     */
    public function thumb(InputFile|string|null $thumb): self
    {
        $this->thumb = $thumb;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'name' => $this->name,
            'user_id' => $this->userId,
            'thumb' => $this->thumb,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
