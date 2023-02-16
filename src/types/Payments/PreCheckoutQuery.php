<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Payments;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\User;

/**
 * This object contains information about an incoming pre-checkout query.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#precheckoutquery
 */
class PreCheckoutQuery implements FromArrayInterface, ToArrayInterface
{
    private ?string $shippingOptionId = null;

    private ?OrderInfo $orderInfo = null;

    private function __construct(
        private string $id,
        private User $from,
        private string $currency,
        private int $totalAmount,
        private string $invoicePayload
    ) {
    }

    /**
     * @param string $id Unique query identifier
     * @param User $from User who sent the query
     * @param string $currency Three-letter ISO 4217
     *                         [currency](https://core.telegram.org/bots/payments#supported-currencies) code
     * @param int $totalAmount Total price in the *smallest units* of the currency (integer, **not** float/double). For
     *                         example, for a price of `US$ 1.45` pass `amount = 145`. See the *exp* parameter in
     *                         [currencies.json](https://core.telegram.org/bots/payments/currencies.json), it shows the
     *                         number of digits past the decimal point for each currency (2 for the majority of
     *                         currencies).
     * @param string $invoicePayload Bot specified invoice payload
     */
    public static function new(string $id, User $from, string $currency, int $totalAmount, string $invoicePayload): self
    {
        return new self($id, $from, $currency, $totalAmount, $invoicePayload);
    }

    /**
     * Identifier of the shipping option chosen by the user
     */
    public function shippingOptionId(?string $shippingOptionId): self
    {
        $this->shippingOptionId = $shippingOptionId;
        return $this;
    }

    /**
     * Order information provided by the user
     */
    public function orderInfo(?OrderInfo $orderInfo): self
    {
        $this->orderInfo = $orderInfo;
        return $this;
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
     * Three-letter ISO 4217 [currency](https://core.telegram.org/bots/payments#supported-currencies) code
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * Total price in the *smallest units* of the currency (integer, **not** float/double). For example, for a price of
     * `US$ 1.45` pass `amount = 145`. See the *exp* parameter in
     * [currencies.json](https://core.telegram.org/bots/payments/currencies.json), it shows the number of digits past
     * the decimal point for each currency (2 for the majority of currencies).
     */
    public function getTotalAmount(): ?int
    {
        return $this->totalAmount;
    }

    /**
     * Bot specified invoice payload
     */
    public function getInvoicePayload(): ?string
    {
        return $this->invoicePayload;
    }

    /**
     * Identifier of the shipping option chosen by the user
     */
    public function getShippingOptionId(): ?string
    {
        return $this->shippingOptionId;
    }

    /**
     * Order information provided by the user
     */
    public function getOrderInfo(): ?OrderInfo
    {
        return $this->orderInfo;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self(
            $array['id'],
            User::fromArray($array['from']),
            $array['currency'],
            $array['total_amount'],
            $array['invoice_payload'],
        );

        $instance->shippingOptionId = $array['shipping_option_id'] ?? null;
        $instance->orderInfo = OrderInfo::fromArray($array['order_info'] ?? null);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'id' => $this->id,
            'from' => $this->from,
            'currency' => $this->currency,
            'total_amount' => $this->totalAmount,
            'invoice_payload' => $this->invoicePayload,
            'shipping_option_id' => $this->shippingOptionId,
            'order_info' => $this->orderInfo,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
