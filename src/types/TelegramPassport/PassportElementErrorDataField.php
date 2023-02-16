<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\TelegramPassport;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents an issue in one of the data fields that was provided by the user. The error is considered resolved when
 * the field's value changes.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#passportelementerrordatafield
 */
class PassportElementErrorDataField implements FromArrayInterface, ToArrayInterface
{
    private function __construct(
        private string $source,
        private string $type,
        private string $fieldName,
        private string $dataHash,
        private string $message
    ) {
    }

    /**
     * @param string $source Error source, must be *data*
     * @param string $type The section of the user's Telegram Passport which has the error, one of “personal\_details”,
     *                     “passport”, “driver\_license”, “identity\_card”, “internal\_passport”, “address”
     * @param string $fieldName Name of the data field which has the error
     * @param string $dataHash Base64-encoded data hash
     * @param string $message Error message
     */
    public static function new(string $source, string $type, string $fieldName, string $dataHash, string $message): self
    {
        return new self($source, $type, $fieldName, $dataHash, $message);
    }

    /**
     * Error source, must be *data*
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * The section of the user's Telegram Passport which has the error, one of “personal\_details”, “passport”,
     * “driver\_license”, “identity\_card”, “internal\_passport”, “address”
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Name of the data field which has the error
     */
    public function getFieldName(): ?string
    {
        return $this->fieldName;
    }

    /**
     * Base64-encoded data hash
     */
    public function getDataHash(): ?string
    {
        return $this->dataHash;
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
            $array['field_name'],
            $array['data_hash'],
            $array['message'],
        );

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'source' => $this->source,
            'type' => $this->type,
            'field_name' => $this->fieldName,
            'data_hash' => $this->dataHash,
            'message' => $this->message,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
