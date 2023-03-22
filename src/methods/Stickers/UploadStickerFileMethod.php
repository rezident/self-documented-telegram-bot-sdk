<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\File;
use Rezident\SelfDocumentedTelegramBotSdk\types\InputFile;

/**
 * Use this method to upload a file with a sticker for later use in the
 * [createNewStickerSet](https://core.telegram.org/bots/api#createnewstickerset) and
 * [addStickerToSet](https://core.telegram.org/bots/api#addstickertoset) methods (the file can be used multiple times).
 * Returns the uploaded [File](https://core.telegram.org/bots/api#file) on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#uploadstickerfile
 */
class UploadStickerFileMethod implements ToArrayInterface
{
    private function __construct(private int $userId, private InputFile $sticker, private string $stickerFormat)
    {
    }

    /**
     * @param int $userId User identifier of sticker file owner
     * @param InputFile $sticker A file with the sticker in .WEBP, .PNG, .TGS, or .WEBM format. See
     *                           [](https://core.telegram.org/stickers)<https://core.telegram.org/stickers> for
     *                           technical requirements.
     *                           [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files)
     * @param string $stickerFormat Format of the sticker, must be one of “static”, “animated”, “video”
     */
    public static function new(int $userId, InputFile $sticker, string $stickerFormat): self
    {
        return new self($userId, $sticker, $stickerFormat);
    }

    public function toArray(): array
    {
        $data = [
            'user_id' => $this->userId,
            'sticker' => $this->sticker,
            'sticker_format' => $this->stickerFormat,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): File
    {
        return File::fromArray($executor->execute($this));
    }
}
