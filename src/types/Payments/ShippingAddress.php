<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Payments;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a shipping address.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#shippingaddress
 */
class ShippingAddress implements FromArrayInterface, ToArrayInterface
{
    private function __construct(
        private string $countryCode,
        private string $state,
        private string $city,
        private string $streetLine1,
        private string $streetLine2,
        private string $postCode
    ) {
    }

    /**
     * @param string $countryCode Two-letter ISO 3166-1 alpha-2 country code
     * @param string $state State, if applicable
     * @param string $city City
     * @param string $streetLine1 First line for the address
     * @param string $streetLine2 Second line for the address
     * @param string $postCode Address post code
     */
    public static function new(
        string $countryCode,
        string $state,
        string $city,
        string $streetLine1,
        string $streetLine2,
        string $postCode,
    ): self {
        return new self($countryCode, $state, $city, $streetLine1, $streetLine2, $postCode);
    }

    /**
     * Two-letter ISO 3166-1 alpha-2 country code
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * State, if applicable
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * City
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * First line for the address
     */
    public function getStreetLine1(): ?string
    {
        return $this->streetLine1;
    }

    /**
     * Second line for the address
     */
    public function getStreetLine2(): ?string
    {
        return $this->streetLine2;
    }

    /**
     * Address post code
     */
    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self(
            $array['country_code'],
            $array['state'],
            $array['city'],
            $array['street_line1'],
            $array['street_line2'],
            $array['post_code'],
        );

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'country_code' => $this->countryCode,
            'state' => $this->state,
            'city' => $this->city,
            'street_line1' => $this->streetLine1,
            'street_line2' => $this->streetLine2,
            'post_code' => $this->postCode,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
