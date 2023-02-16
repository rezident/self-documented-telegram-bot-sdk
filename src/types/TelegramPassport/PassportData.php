<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\TelegramPassport;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfEncryptedPassportElement;

/**
 * Describes Telegram Passport data shared with the bot by the user.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#passportdata
 */
class PassportData implements FromArrayInterface, ToArrayInterface
{
    private function __construct(
        private ArrayOfEncryptedPassportElement $data,
        private EncryptedCredentials $credentials
    ) {
    }

    /**
     * @param ArrayOfEncryptedPassportElement $data Array with information about documents and other Telegram Passport
     *                                              elements that was shared with the bot
     * @param EncryptedCredentials $credentials Encrypted credentials required to decrypt the data
     */
    public static function new(ArrayOfEncryptedPassportElement $data, EncryptedCredentials $credentials): self
    {
        return new self($data, $credentials);
    }

    /**
     * Array with information about documents and other Telegram Passport elements that was shared with the bot
     */
    public function getData(): ?ArrayOfEncryptedPassportElement
    {
        return $this->data;
    }

    /**
     * Encrypted credentials required to decrypt the data
     */
    public function getCredentials(): ?EncryptedCredentials
    {
        return $this->credentials;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self(
            ArrayOfEncryptedPassportElement::fromArray($array['data']),
            EncryptedCredentials::fromArray($array['credentials']),
        );

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'data' => $this->data,
            'credentials' => $this->credentials,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
