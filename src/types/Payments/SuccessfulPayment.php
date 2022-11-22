<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Payments;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object contains basic information about a successful payment.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#successfulpayment
 */
class SuccessfulPayment implements FromArrayInterface, ToArrayInterface
{
    private ?string $shippingOptionId = null;

    private ?OrderInfo $orderInfo = null;

    private function __construct(
        private string $currency,
        private int $totalAmount,
        private string $invoicePayload,
        private string $telegramPaymentChargeId,
        private string $providerPaymentChargeId
    ) {
    }

    /**
     * @param string $currency Three-letter ISO 4217
     *                         [currency](https://core.telegram.org/bots/payments#supported-currencies) code
     * @param int $totalAmount Total price in the *smallest units* of the currency (integer, **not** float/double). For
     *                         example, for a price of `US$ 1.45` pass `amount = 145`. See the *exp* parameter in
     *                         [currencies.json](https://core.telegram.org/bots/payments/currencies.json), it shows the
     *                         number of digits past the decimal point for each currency (2 for the majority of
     *                         currencies).
     * @param string $invoicePayload Bot specified invoice payload
     * @param string $telegramPaymentChargeId Telegram payment identifier
     * @param string $providerPaymentChargeId Provider payment identifier
     */
    public static function new(
        string $currency,
        int $totalAmount,
        string $invoicePayload,
        string $telegramPaymentChargeId,
        string $providerPaymentChargeId,
    ): self {
        return new self($currency, $totalAmount, $invoicePayload, $telegramPaymentChargeId, $providerPaymentChargeId);
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

    /**
     * Telegram payment identifier
     */
    public function getTelegramPaymentChargeId(): ?string
    {
        return $this->telegramPaymentChargeId;
    }

    /**
     * Provider payment identifier
     */
    public function getProviderPaymentChargeId(): ?string
    {
        return $this->providerPaymentChargeId;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self(
            $array['currency'],
            $array['total_amount'],
            $array['invoice_payload'],
            $array['telegram_payment_charge_id'],
            $array['provider_payment_charge_id'],
        );

        $instance->shippingOptionId = $array['shipping_option_id'] ?? null;
        $instance->orderInfo = OrderInfo::fromArray($array['order_info'] ?? null);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'currency' => $this->currency,
            'total_amount' => $this->totalAmount,
            'invoice_payload' => $this->invoicePayload,
            'shipping_option_id' => $this->shippingOptionId,
            'order_info' => $this->orderInfo,
            'telegram_payment_charge_id' => $this->telegramPaymentChargeId,
            'provider_payment_charge_id' => $this->providerPaymentChargeId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
