<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a [video message](https://telegram.org/blog/video-messages-and-telescope) (available in
 * Telegram apps as of [v.4.0](https://telegram.org/blog/video-messages-and-telescope)).
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#videonote
 */
class VideoNote implements FromArrayInterface, ToArrayInterface
{
    private ?PhotoSize $thumb = null;

    private ?int $fileSize = null;

    private function __construct(
        private string $fileId,
        private string $fileUniqueId,
        private int $length,
        private int $duration
    ) {
    }

    /**
     * @param string $fileId Identifier for this file, which can be used to download or reuse the file
     * @param string $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for
     *                             different bots. Can't be used to download or reuse the file.
     * @param int $length Video width and height (diameter of the video message) as defined by sender
     * @param int $duration Duration of the video in seconds as defined by sender
     */
    public static function new(string $fileId, string $fileUniqueId, int $length, int $duration): self
    {
        return new self($fileId, $fileUniqueId, $length, $duration);
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
     * Video width and height (diameter of the video message) as defined by sender
     */
    public function getLength(): ?int
    {
        return $this->length;
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

        $instance = new self($array['file_id'], $array['file_unique_id'], $array['length'], $array['duration']);

        $instance->thumb = PhotoSize::fromArray($array['thumb'] ?? null);
        $instance->fileSize = $array['file_size'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'file_id' => $this->fileId,
            'file_unique_id' => $this->fileUniqueId,
            'length' => $this->length,
            'duration' => $this->duration,
            'thumb' => $this->thumb,
            'file_size' => $this->fileSize,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
