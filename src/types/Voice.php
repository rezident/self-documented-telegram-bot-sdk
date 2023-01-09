<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a voice note.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#voice
 */
class Voice implements FromArrayInterface, ToArrayInterface
{
    private ?string $mimeType = null;

    private ?int $fileSize = null;

    private function __construct(private string $fileId, private string $fileUniqueId, private int $duration)
    {
    }

    /**
     * @param string $fileId Identifier for this file, which can be used to download or reuse the file
     * @param string $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for
     *                             different bots. Can't be used to download or reuse the file.
     * @param int $duration Duration of the audio in seconds as defined by sender
     */
    public static function new(string $fileId, string $fileUniqueId, int $duration): self
    {
        return new self($fileId, $fileUniqueId, $duration);
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
     * Duration of the audio in seconds as defined by sender
     */
    public function getDuration(): ?int
    {
        return $this->duration;
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

        $instance = new self($array['file_id'], $array['file_unique_id'], $array['duration']);

        $instance->mimeType = $array['mime_type'] ?? null;
        $instance->fileSize = $array['file_size'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'file_id' => $this->fileId,
            'file_unique_id' => $this->fileUniqueId,
            'duration' => $this->duration,
            'mime_type' => $this->mimeType,
            'file_size' => $this->fileSize,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
