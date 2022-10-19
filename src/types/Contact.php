<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a phone contact.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#contact
 */
class Contact implements FromArrayInterface, ToArrayInterface
{
    private ?string $lastName = null;

    private ?int $userId = null;

    private ?string $vcard = null;

    private function __construct(private string $phoneNumber, private string $firstName)
    {
    }

    /**
     * @param string $phoneNumber Contact's phone number
     * @param string $firstName Contact's first name
     */
    public static function new(string $phoneNumber, string $firstName): self
    {
        return new self($phoneNumber, $firstName);
    }

    /**
     * Contact's last name
     */
    public function lastName(?string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * Contact's user identifier in Telegram. This number may have more than 32 significant bits and some programming
     * languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a
     * 64-bit integer or double-precision float type are safe for storing this identifier.
     */
    public function userId(?int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * Additional data about the contact in the form of a [vCard](https://en.wikipedia.org/wiki/VCard)
     */
    public function vcard(?string $vcard): self
    {
        $this->vcard = $vcard;
        return $this;
    }

    /**
     * Contact's phone number
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * Contact's first name
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Contact's last name
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Contact's user identifier in Telegram. This number may have more than 32 significant bits and some programming
     * languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a
     * 64-bit integer or double-precision float type are safe for storing this identifier.
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * Additional data about the contact in the form of a [vCard](https://en.wikipedia.org/wiki/VCard)
     */
    public function getVcard(): ?string
    {
        return $this->vcard;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['phone_number'], $array['first_name']);

        $instance->lastName = $array['last_name'] ?? null;
        $instance->userId = $array['user_id'] ?? null;
        $instance->vcard = $array['vcard'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'phone_number' => $this->phoneNumber,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'user_id' => $this->userId,
            'vcard' => $this->vcard,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
