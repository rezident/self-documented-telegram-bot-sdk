<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\TelegramPassport;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfString;

/**
 * Represents an issue with a list of scans. The error is considered resolved when the list of files containing the
 * scans changes.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#passportelementerrorfiles
 */
class PassportElementErrorFiles implements FromArrayInterface, ToArrayInterface
{
    private function __construct(
        private string $source,
        private string $type,
        private ArrayOfString $fileHashes,
        private string $message
    ) {
    }

    /**
     * @param string $source Error source, must be *files*
     * @param string $type The section of the user's Telegram Passport which has the issue, one of “utility\_bill”,
     *                     “bank\_statement”, “rental\_agreement”, “passport\_registration”, “temporary\_registration”
     * @param ArrayOfString $fileHashes List of base64-encoded file hashes
     * @param string $message Error message
     */
    public static function new(string $source, string $type, ArrayOfString $fileHashes, string $message): self
    {
        return new self($source, $type, $fileHashes, $message);
    }

    /**
     * Error source, must be *files*
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * The section of the user's Telegram Passport which has the issue, one of “utility\_bill”, “bank\_statement”,
     * “rental\_agreement”, “passport\_registration”, “temporary\_registration”
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * List of base64-encoded file hashes
     */
    public function getFileHashes(): ?ArrayOfString
    {
        return $this->fileHashes;
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

        $instance = new self(
            $array['source'],
            $array['type'],
            ArrayOfString::fromArray($array['file_hashes']),
            $array['message'],
        );

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'source' => $this->source,
            'type' => $this->type,
            'file_hashes' => $this->fileHashes,
            'message' => $this->message,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
