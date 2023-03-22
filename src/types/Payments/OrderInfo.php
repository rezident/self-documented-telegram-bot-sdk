<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Payments;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents information about an order.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#orderinfo
 */
class OrderInfo implements FromArrayInterface, ToArrayInterface
{
    private ?string $name = null;

    private ?string $phoneNumber = null;

    private ?string $email = null;

    private ?ShippingAddress $shippingAddress = null;

    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    /**
     * User name
     */
    public function name(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * User's phone number
     */
    public function phoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * User email
     */
    public function email(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * User shipping address
     */
    public function shippingAddress(?ShippingAddress $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }

    /**
     * User name
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * User's phone number
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * User email
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * User shipping address
     */
    public function getShippingAddress(): ?ShippingAddress
    {
        return $this->shippingAddress;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self();

        $instance->name = $array['name'] ?? null;
        $instance->phoneNumber = $array['phone_number'] ?? null;
        $instance->email = $array['email'] ?? null;
        $instance->shippingAddress = ShippingAddress::fromArray($array['shipping_address'] ?? null);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'name' => $this->name,
            'phone_number' => $this->phoneNumber,
            'email' => $this->email,
            'shipping_address' => $this->shippingAddress,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
