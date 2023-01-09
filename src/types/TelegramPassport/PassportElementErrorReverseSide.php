<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\TelegramPassport;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents an issue with the reverse side of a document. The error is considered resolved when the file with reverse
 * side of the document changes.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#passportelementerrorreverseside
 */
class PassportElementErrorReverseSide implements FromArrayInterface, ToArrayInterface
{
    private function __construct(
        private string $source,
        private string $type,
        private string $fileHash,
        private string $message
    ) {
    }

    /**
     * @param string $source Error source, must be *reverse\_side*
     * @param string $type The section of the user's Telegram Passport which has the issue, one of “driver\_license”,
     *                     “identity\_card”
     * @param string $fileHash Base64-encoded hash of the file with the reverse side of the document
     * @param string $message Error message
     */
    public static function new(string $source, string $type, string $fileHash, string $message): self
    {
        return new self($source, $type, $fileHash, $message);
    }

    /**
     * Error source, must be *reverse\_side*
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * The section of the user's Telegram Passport which has the issue, one of “driver\_license”, “identity\_card”
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Base64-encoded hash of the file with the reverse side of the document
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
