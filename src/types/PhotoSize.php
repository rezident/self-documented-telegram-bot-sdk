<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents one size of a photo or a [file](https://core.telegram.org/bots/api#document) /
 * [sticker](https://core.telegram.org/bots/api#sticker) thumbnail.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#photosize
 */
class PhotoSize implements FromArrayInterface, ToArrayInterface
{
    private ?int $fileSize = null;

    private function __construct(
        private string $fileId,
        private string $fileUniqueId,
        private int $width,
        private int $height
    ) {
    }

    /**
     * @param string $fileId Identifier for this file, which can be used to download or reuse the file
     * @param string $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for
     *                             different bots. Can't be used to download or reuse the file.
     * @param int $width Photo width
     * @param int $height Photo height
     */
    public static function new(string $fileId, string $fileUniqueId, int $width, int $height): self
    {
        return new self($fileId, $fileUniqueId, $width, $height);
    }

    /**
     * File size in bytes
     */
    public function fileSize(?int $fileSize): self
    {
        $this->fileSize = $fileSize;
        return $this;
    }

    /**
     * Identifier for this file, which can be used to download or reuse the file
     */
    public function getFileId(): ?string
    {
        return $this->fileId;
    }

    /**
     * Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be
     * used to download or reuse the file.
     */
    public function getFileUniqueId(): ?string
    {
        return $this->fileUniqueId;
    }

    /**
     * Photo width
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * Photo height
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * File size in bytes
     */
    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['file_id'], $array['file_unique_id'], $array['width'], $array['height']);

        $instance->fileSize = $array['file_size'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'file_id' => $this->fileId,
            'file_unique_id' => $this->fileUniqueId,
            'width' => $this->width,
            'height' => $this->height,
            'file_size' => $this->fileSize,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
