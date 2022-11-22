<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\TelegramPassport;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Describes data required for decrypting and authenticating
 * [EncryptedPassportElement](https://core.telegram.org/bots/api#encryptedpassportelement). See the
 * [Telegram Passport Documentation](https://core.telegram.org/passport#receiving-information) for a complete
 * description of the data decryption and authentication processes.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#encryptedcredentials
 */
class EncryptedCredentials implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private string $data, private string $hash, private string $secret)
    {
    }

    /**
     * @param string $data Base64-encoded encrypted JSON-serialized data with unique user's payload, data hashes and
     *                     secrets required for
     *                     [EncryptedPassportElement](https://core.telegram.org/bots/api#encryptedpassportelement)
     *                     decryption and authentication
     * @param string $hash Base64-encoded data hash for data authentication
     * @param string $secret Base64-encoded secret, encrypted with the bot's public RSA key, required for data
     *                       decryption
     */
    public static function new(string $data, string $hash, string $secret): self
    {
        return new self($data, $hash, $secret);
    }

    /**
     * Base64-encoded encrypted JSON-serialized data with unique user's payload, data hashes and secrets required for
     * [EncryptedPassportElement](https://core.telegram.org/bots/api#encryptedpassportelement) decryption and
     * authentication
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * Base64-encoded data hash for data authentication
     */
    public function getHash(): ?string
    {
        return $this->hash;
    }

    /**
     * Base64-encoded secret, encrypted with the bot's public RSA key, required for data decryption
     */
    public function getSecret(): ?string
    {
        return $this->secret;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['data'], $array['hash'], $array['secret']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'data' => $this->data,
            'hash' => $this->hash,
            'secret' => $this->secret,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
