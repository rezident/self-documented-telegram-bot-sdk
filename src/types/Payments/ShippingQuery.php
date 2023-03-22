<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Payments;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\User;

/**
 * This object contains information about an incoming shipping query.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#shippingquery
 */
class ShippingQuery implements FromArrayInterface, ToArrayInterface
{
    private function __construct(
        private string $id,
        private User $from,
        private string $invoicePayload,
        private ShippingAddress $shippingAddress
    ) {
    }

    /**
     * @param string $id Unique query identifier
     * @param User $from User who sent the query
     * @param string $invoicePayload Bot specified invoice payload
     * @param ShippingAddress $shippingAddress User specified shipping address
     */
    public static function new(string $id, User $from, string $invoicePayload, ShippingAddress $shippingAddress): self
    {
        return new self($id, $from, $invoicePayload, $shippingAddress);
    }

    /**
     * Unique query identifier
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * User who sent the query
     */
    public function getFrom(): ?User
    {
        return $this->from;
    }

    /**
     * Bot specified invoice payload
     */
    public function getInvoicePayload(): ?string
    {
        return $this->invoicePayload;
    }

    /**
     * User specified shipping address
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

        $instance = new self(
            $array['id'],
            User::fromArray($array['from']),
            $array['invoice_payload'],
            ShippingAddress::fromArray($array['shipping_address']),
        );

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'id' => $this->id,
            'from' => $this->from,
            'invoice_payload' => $this->invoicePayload,
            'shipping_address' => $this->shippingAddress,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
