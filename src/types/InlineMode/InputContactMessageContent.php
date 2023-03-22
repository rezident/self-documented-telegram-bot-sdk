<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents the [content](https://core.telegram.org/bots/api#inputmessagecontent) of a contact message to be sent as
 * the result of an inline query.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inputcontactmessagecontent
 */
class InputContactMessageContent implements FromArrayInterface, ToArrayInterface
{
    private ?string $lastName = null;

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
     * Additional data about the contact in the form of a [vCard](https://en.wikipedia.org/wiki/VCard), 0-2048 bytes
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
     * Additional data about the contact in the form of a [vCard](https://en.wikipedia.org/wiki/VCard), 0-2048 bytes
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
        $instance->vcard = $array['vcard'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'phone_number' => $this->phoneNumber,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'vcard' => $this->vcard,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
