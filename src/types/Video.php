<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a video file.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#video
 */
class Video implements FromArrayInterface, ToArrayInterface
{
    private ?PhotoSize $thumb = null;

    private ?string $fileName = null;

    private ?string $mimeType = null;

    private ?int $fileSize = null;

    private function __construct(
        private string $fileId,
        private string $fileUniqueId,
        private int $width,
        private int $height,
        private int $duration
    ) {
    }

    /**
     * @param string $fileId Identifier for this file, which can be used to download or reuse the file
     * @param string $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for
     *                             different bots. Can't be used to download or reuse the file.
     * @param int $width Video width as defined by sender
     * @param int $height Video height as defined by sender
     * @param int $duration Duration of the video in seconds as defined by sender
     */
    public static function new(string $fileId, string $fileUniqueId, int $width, int $height, int $duration): self
    {
        return new self($fileId, $fileUniqueId, $width, $height, $duration);
    }

    /**
     * Video thumbnail
     */
    public function thumb(?PhotoSize $thumb): self
    {
        $this->thumb = $thumb;
        return $this;
    }

    /**
     * Original filename as defined by sender
     */
    public function fileName(?string $fileName): self
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * MIME type of the file as defined by sender
     */
    public function mimeType(?string $mimeType): self
    {
        $this->mimeType = $mimeType;
        return $this;
    }

    /**
     * File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects
     * in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float
     * type are safe for storing this value.
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
     * Video width as defined by sender
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * Video height as defined by sender
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * Duration of the video in seconds as defined by sender
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * Video thumbnail
     */
    public function getThumb(): ?PhotoSize
    {
        return $this->thumb;
    }

    /**
     * Original filename as defined by sender
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    /**
     * MIME type of the file as defined by sender
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    /**
     * File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects
     * in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float
     * type are safe for storing this value.
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

        $instance = new self(
            $array['file_id'],
            $array['file_unique_id'],
            $array['width'],
            $array['height'],
            $array['duration'],
        );

        $instance->thumb = PhotoSize::fromArray($array['thumb'] ?? null);
        $instance->fileName = $array['file_name'] ?? null;
        $instance->mimeType = $array['mime_type'] ?? null;
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
            'duration' => $this->duration,
            'thumb' => $this->thumb,
            'file_name' => $this->fileName,
            'mime_type' => $this->mimeType,
            'file_size' => $this->fileSize,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
