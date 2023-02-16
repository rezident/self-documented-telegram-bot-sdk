<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents an audio file to be treated as music by the Telegram clients.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#audio
 */
class Audio implements FromArrayInterface, ToArrayInterface
{
    private ?string $performer = null;

    private ?string $title = null;

    private ?string $fileName = null;

    private ?string $mimeType = null;

    private ?int $fileSize = null;

    private ?PhotoSize $thumb = null;

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
     * Performer of the audio as defined by sender or by audio tags
     */
    public function performer(?string $performer): self
    {
        $this->performer = $performer;
        return $this;
    }

    /**
     * Title of the audio as defined by sender or by audio tags
     */
    public function title(?string $title): self
    {
        $this->title = $title;
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
     * Thumbnail of the album cover to which the music file belongs
     */
    public function thumb(?PhotoSize $thumb): self
    {
        $this->thumb = $thumb;
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
     * Performer of the audio as defined by sender or by audio tags
     */
    public function getPerformer(): ?string
    {
        return $this->performer;
    }

    /**
     * Title of the audio as defined by sender or by audio tags
     */
    public function getTitle(): ?string
    {
        return $this->title;
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

    /**
     * Thumbnail of the album cover to which the music file belongs
     */
    public function getThumb(): ?PhotoSize
    {
        return $this->thumb;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['file_id'], $array['file_unique_id'], $array['duration']);

        $instance->performer = $array['performer'] ?? null;
        $instance->title = $array['title'] ?? null;
        $instance->fileName = $array['file_name'] ?? null;
        $instance->mimeType = $array['mime_type'] ?? null;
        $instance->fileSize = $array['file_size'] ?? null;
        $instance->thumb = PhotoSize::fromArray($array['thumb'] ?? null);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'file_id' => $this->fileId,
            'file_unique_id' => $this->fileUniqueId,
            'duration' => $this->duration,
            'performer' => $this->performer,
            'title' => $this->title,
            'file_name' => $this->fileName,
            'mime_type' => $this->mimeType,
            'file_size' => $this->fileSize,
            'thumb' => $this->thumb,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
