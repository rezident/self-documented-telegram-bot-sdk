<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\File;
use Rezident\SelfDocumentedTelegramBotSdk\types\InputFile;

/**
 * Use this method to upload a .PNG file with a sticker for later use in *createNewStickerSet* and *addStickerToSet*
 * methods (can be used multiple times). Returns the uploaded [File](https://core.telegram.org/bots/api#file) on
 * success.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#uploadstickerfile
 */
class UploadStickerFileMethod implements ToArrayInterface
{
    private function __construct(private int $userId, private InputFile $pngSticker)
    {
    }

    /**
     * @param int $userId User identifier of sticker file owner
     * @param InputFile $pngSticker **PNG** image with the sticker, must be up to 512 kilobytes in size, dimensions
     *                              must not exceed 512px, and either width or height must be exactly 512px.
     *                              [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files)
     */
    public static function new(int $userId, InputFile $pngSticker): self
    {
        return new self($userId, $pngSticker);
    }

    public function toArray(): array
    {
        $data = [
            'user_id' => $this->userId,
            'png_sticker' => $this->pngSticker,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): File
    {
        return File::fromArray($executor->execute($this));
    }
}
