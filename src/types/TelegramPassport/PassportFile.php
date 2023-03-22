<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\TelegramPassport;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a file uploaded to Telegram Passport. Currently all Telegram Passport files are in JPEG format
 * when decrypted and don't exceed 10MB.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#passportfile
 */
class PassportFile implements FromArrayInterface, ToArrayInterface
{
    private function __construct(
        private string $fileId,
        private string $fileUniqueId,
        private int $fileSize,
        private int $fileDate
    ) {
    }

    /**
     * @param string $fileId Identifier for this file, which can be used to download or reuse the file
     * @param string $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for
     *                             different bots. Can't be used to download or reuse the file.
     * @param int $fileSize File size in bytes
     * @param int $fileDate Unix time when the file was uploaded
     */
    public static function new(string $fileId, string $fileUniqueId, int $fileSize, int $fileDate): self
    {
        return new self($fileId, $fileUniqueId, $fileSize, $fileDate);
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
     * File size in bytes
     */
    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }

    /**
     * Unix time when the file was uploaded
     */
    public function getFileDate(): ?int
    {
        return $this->fileDate;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['file_id'], $array['file_unique_id'], $array['file_size'], $array['file_date']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'file_id' => $this->fileId,
            'file_unique_id' => $this->fileUniqueId,
            'file_size' => $this->fileSize,
            'file_date' => $this->fileDate,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
