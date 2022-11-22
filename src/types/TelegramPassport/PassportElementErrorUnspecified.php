<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\TelegramPassport;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents an issue in an unspecified place. The error is considered resolved when new data is added.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#passportelementerrorunspecified
 */
class PassportElementErrorUnspecified implements FromArrayInterface, ToArrayInterface
{
    private function __construct(
        private string $source,
        private string $type,
        private string $elementHash,
        private string $message
    ) {
    }

    /**
     * @param string $source Error source, must be *unspecified*
     * @param string $type Type of element of the user's Telegram Passport which has the issue
     * @param string $elementHash Base64-encoded element hash
     * @param string $message Error message
     */
    public static function new(string $source, string $type, string $elementHash, string $message): self
    {
        return new self($source, $type, $elementHash, $message);
    }

    /**
     * Error source, must be *unspecified*
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * Type of element of the user's Telegram Passport which has the issue
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Base64-encoded element hash
     */
    public function getElementHash(): ?string
    {
        return $this->elementHash;
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

        $instance = new self($array['source'], $array['type'], $array['element_hash'], $array['message']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'source' => $this->source,
            'type' => $this->type,
            'element_hash' => $this->elementHash,
            'message' => $this->message,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
