<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\TelegramPassport;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfPassportFile;

/**
 * Describes documents or other Telegram Passport elements shared with the bot by the user.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#encryptedpassportelement
 */
class EncryptedPassportElement implements FromArrayInterface, ToArrayInterface
{
    private ?string $data = null;

    private ?string $phoneNumber = null;

    private ?string $email = null;

    private ?ArrayOfPassportFile $files = null;

    private ?PassportFile $frontSide = null;

    private ?PassportFile $reverseSide = null;

    private ?PassportFile $selfie = null;

    private ?ArrayOfPassportFile $translation = null;

    private function __construct(private string $type, private string $hash)
    {
    }

    /**
     * @param string $type Element type. One of “personal\_details”, “passport”, “driver\_license”, “identity\_card”,
     *                     “internal\_passport”, “address”, “utility\_bill”, “bank\_statement”, “rental\_agreement”,
     *                     “passport\_registration”, “temporary\_registration”, “phone\_number”, “email”.
     * @param string $hash Base64-encoded element hash for using in
     *                     [PassportElementErrorUnspecified](https://core.telegram.org/bots/api#passportelementerrorunspecified)
     */
    public static function new(string $type, string $hash): self
    {
        return new self($type, $hash);
    }

    /**
     * Base64-encoded encrypted Telegram Passport element data provided by the user, available for “personal\_details”,
     * “passport”, “driver\_license”, “identity\_card”, “internal\_passport” and “address” types. Can be decrypted and
     * verified using the accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
     */
    public function data(?string $data): self
    {
        $this->data = $data;
        return $this;
    }

    /**
     * User's verified phone number, available only for “phone\_number” type
     */
    public function phoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * User's verified email address, available only for “email” type
     */
    public function email(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Array of encrypted files with documents provided by the user, available for “utility\_bill”, “bank\_statement”,
     * “rental\_agreement”, “passport\_registration” and “temporary\_registration” types. Files can be decrypted and
     * verified using the accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
     */
    public function files(?ArrayOfPassportFile $files): self
    {
        $this->files = $files;
        return $this;
    }

    /**
     * Encrypted file with the front side of the document, provided by the user. Available for “passport”,
     * “driver\_license”, “identity\_card” and “internal\_passport”. The file can be decrypted and verified using the
     * accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
     */
    public function frontSide(?PassportFile $frontSide): self
    {
        $this->frontSide = $frontSide;
        return $this;
    }

    /**
     * Encrypted file with the reverse side of the document, provided by the user. Available for “driver\_license” and
     * “identity\_card”. The file can be decrypted and verified using the accompanying
     * [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
     */
    public function reverseSide(?PassportFile $reverseSide): self
    {
        $this->reverseSide = $reverseSide;
        return $this;
    }

    /**
     * Encrypted file with the selfie of the user holding a document, provided by the user; available for “passport”,
     * “driver\_license”, “identity\_card” and “internal\_passport”. The file can be decrypted and verified using the
     * accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
     */
    public function selfie(?PassportFile $selfie): self
    {
        $this->selfie = $selfie;
        return $this;
    }

    /**
     * Array of encrypted files with translated versions of documents provided by the user. Available if requested for
     * “passport”, “driver\_license”, “identity\_card”, “internal\_passport”, “utility\_bill”, “bank\_statement”,
     * “rental\_agreement”, “passport\_registration” and “temporary\_registration” types. Files can be decrypted and
     * verified using the accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
     */
    public function translation(?ArrayOfPassportFile $translation): self
    {
        $this->translation = $translation;
        return $this;
    }

    /**
     * Element type. One of “personal\_details”, “passport”, “driver\_license”, “identity\_card”, “internal\_passport”,
     * “address”, “utility\_bill”, “bank\_statement”, “rental\_agreement”, “passport\_registration”,
     * “temporary\_registration”, “phone\_number”, “email”.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Base64-encoded encrypted Telegram Passport element data provided by the user, available for “personal\_details”,
     * “passport”, “driver\_license”, “identity\_card”, “internal\_passport” and “address” types. Can be decrypted and
     * verified using the accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * User's verified phone number, available only for “phone\_number” type
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * User's verified email address, available only for “email” type
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Array of encrypted files with documents provided by the user, available for “utility\_bill”, “bank\_statement”,
     * “rental\_agreement”, “passport\_registration” and “temporary\_registration” types. Files can be decrypted and
     * verified using the accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
     */
    public function getFiles(): ?ArrayOfPassportFile
    {
        return $this->files;
    }

    /**
     * Encrypted file with the front side of the document, provided by the user. Available for “passport”,
     * “driver\_license”, “identity\_card” and “internal\_passport”. The file can be decrypted and verified using the
     * accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
     */
    public function getFrontSide(): ?PassportFile
    {
        return $this->frontSide;
    }

    /**
     * Encrypted file with the reverse side of the document, provided by the user. Available for “driver\_license” and
     * “identity\_card”. The file can be decrypted and verified using the accompanying
     * [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
     */
    public function getReverseSide(): ?PassportFile
    {
        return $this->reverseSide;
    }

    /**
     * Encrypted file with the selfie of the user holding a document, provided by the user; available for “passport”,
     * “driver\_license”, “identity\_card” and “internal\_passport”. The file can be decrypted and verified using the
     * accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
     */
    public function getSelfie(): ?PassportFile
    {
        return $this->selfie;
    }

    /**
     * Array of encrypted files with translated versions of documents provided by the user. Available if requested for
     * “passport”, “driver\_license”, “identity\_card”, “internal\_passport”, “utility\_bill”, “bank\_statement”,
     * “rental\_agreement”, “passport\_registration” and “temporary\_registration” types. Files can be decrypted and
     * verified using the accompanying [EncryptedCredentials](https://core.telegram.org/bots/api#encryptedcredentials).
     */
    public function getTranslation(): ?ArrayOfPassportFile
    {
        return $this->translation;
    }

    /**
     * Base64-encoded element hash for using in
     * [PassportElementErrorUnspecified](https://core.telegram.org/bots/api#passportelementerrorunspecified)
     */
    public function getHash(): ?string
    {
        return $this->hash;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['type'], $array['hash']);

        $instance->data = $array['data'] ?? null;
        $instance->phoneNumber = $array['phone_number'] ?? null;
        $instance->email = $array['email'] ?? null;
        $instance->files = ArrayOfPassportFile::fromArray($array['files'] ?? null);
        $instance->frontSide = PassportFile::fromArray($array['front_side'] ?? null);
        $instance->reverseSide = PassportFile::fromArray($array['reverse_side'] ?? null);
        $instance->selfie = PassportFile::fromArray($array['selfie'] ?? null);
        $instance->translation = ArrayOfPassportFile::fromArray($array['translation'] ?? null);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'type' => $this->type,
            'data' => $this->data,
            'phone_number' => $this->phoneNumber,
            'email' => $this->email,
            'files' => $this->files,
            'front_side' => $this->frontSide,
            'reverse_side' => $this->reverseSide,
            'selfie' => $this->selfie,
            'translation' => $this->translation,
            'hash' => $this->hash,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
