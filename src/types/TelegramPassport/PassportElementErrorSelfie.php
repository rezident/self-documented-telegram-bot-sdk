<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\TelegramPassport;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents an issue with the selfie with a document. The error is considered resolved when the file with the selfie
 * changes.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#passportelementerrorselfie
 */
class PassportElementErrorSelfie implements FromArrayInterface, ToArrayInterface
{
    private function __construct(
        private string $source,
        private string $type,
        private string $fileHash,
        private string $message
    ) {
    }

    /**
     * @param string $source Error source, must be *selfie*
     * @param string $type The section of the user's Telegram Passport which has the issue, one of “passport”,
     *                     “driver\_license”, “identity\_card”, “internal\_passport”
     * @param string $fileHash Base64-encoded hash of the file with the selfie
     * @param string $message Error message
     */
    public static function new(string $source, string $type, string $fileHash, string $message): self
    {
        return new self($source, $type, $fileHash, $message);
    }

    /**
     * Error source, must be *selfie*
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * The section of the user's Telegram Passport which has the issue, one of “passport”, “driver\_license”,
     * “identity\_card”, “internal\_passport”
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Base64-encoded hash of the file with the selfie
     */
    public function getFileHash(): ?string
    {
        return $this->fileHash;
    }

    /**
     * Error message
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['source'], $array['type'], $array['file_hash'], $array['message']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'source' => $this->source,
            'type' => $this->type,
            'file_hash' => $this->fileHash,
            'message' => $this->message,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
