<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a file ready to be downloaded. The file can be downloaded via the link
 * `https://api.telegram.org/file/bot<token>/<file_path>`. It is guaranteed that the link will be valid for at least 1
 * hour. When the link expires, a new one can be requested by calling
 * [getFile](https://core.telegram.org/bots/api#getfile).
 *
 * > The maximum file size to download is 20 MB
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#file
 */
class File implements FromArrayInterface, ToArrayInterface
{
    private ?int $fileSize = null;

    private ?string $filePath = null;

    private function __construct(private string $fileId, private string $fileUniqueId)
    {
    }

    /**
     * @param string $fileId Identifier for this file, which can be used to download or reuse the file
     * @param string $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for
     *                             different bots. Can't be used to download or reuse the file.
     */
    public static function new(string $fileId, string $fileUniqueId): self
    {
        return new self($fileId, $fileUniqueId);
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
     * File path. Use `https://api.telegram.org/file/bot<token>/<file_path>` to get the file.
     */
    public function filePath(?string $filePath): self
    {
        $this->filePath = $filePath;
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
     * File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects
     * in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float
     * type are safe for storing this value.
     */
    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }

    /**
     * File path. Use `https://api.telegram.org/file/bot<token>/<file_path>` to get the file.
     */
    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['file_id'], $array['file_unique_id']);

        $instance->fileSize = $array['file_size'] ?? null;
        $instance->filePath = $array['file_path'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'file_id' => $this->fileId,
            'file_unique_id' => $this->fileUniqueId,
            'file_size' => $this->fileSize,
            'file_path' => $this->filePath,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
