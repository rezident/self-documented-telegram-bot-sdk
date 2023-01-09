<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\TelegramPassport;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents an issue with one of the files that constitute the translation of a document. The error is considered
 * resolved when the file changes.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#passportelementerrortranslationfile
 */
class PassportElementErrorTranslationFile implements FromArrayInterface, ToArrayInterface
{
    private function __construct(
        private string $source,
        private string $type,
        private string $fileHash,
        private string $message
    ) {
    }

    /**
     * @param string $source Error source, must be *translation\_file*
     * @param string $type Type of element of the user's Telegram Passport which has the issue, one of “passport”,
     *                     “driver\_license”, “identity\_card”, “internal\_passport”, “utility\_bill”,
     *                     “bank\_statement”, “rental\_agreement”, “passport\_registration”, “temporary\_registration”
     * @param string $fileHash Base64-encoded file hash
     * @param string $message Error message
     */
    public static function new(string $source, string $type, string $fileHash, string $message): self
    {
        return new self($source, $type, $fileHash, $message);
    }

    /**
     * Error source, must be *translation\_file*
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * Type of element of the user's Telegram Passport which has the issue, one of “passport”, “driver\_license”,
     * “identity\_card”, “internal\_passport”, “utility\_bill”, “bank\_statement”, “rental\_agreement”,
     * “passport\_registration”, “temporary\_registration”
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Base64-encoded file hash
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
