<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Payments;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object contains basic information about an invoice.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#invoice
 */
class Invoice implements FromArrayInterface, ToArrayInterface
{
    private function __construct(
        private string $title,
        private string $description,
        private string $startParameter,
        private string $currency,
        private int $totalAmount
    ) {
    }

    /**
     * @param string $title Product name
     * @param string $description Product description
     * @param string $startParameter Unique bot deep-linking parameter that can be used to generate this invoice
     * @param string $currency Three-letter ISO 4217
     *                         [currency](https://core.telegram.org/bots/payments#supported-currencies) code
     * @param int $totalAmount Total price in the *smallest units* of the currency (integer, **not** float/double). For
     *                         example, for a price of `US$ 1.45` pass `amount = 145`. See the *exp* parameter in
     *                         [currencies.json](https://core.telegram.org/bots/payments/currencies.json), it shows the
     *                         number of digits past the decimal point for each currency (2 for the majority of
     *                         currencies).
     */
    public static function new(
        string $title,
        string $description,
        string $startParameter,
        string $currency,
        int $totalAmount,
    ): self {
        return new self($title, $description, $startParameter, $currency, $totalAmount);
    }

    /**
     * Product name
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Product description
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Unique bot deep-linking parameter that can be used to generate this invoice
     */
    public function getStartParameter(): ?string
    {
        return $this->startParameter;
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

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self(
            $array['title'],
            $array['description'],
            $array['start_parameter'],
            $array['currency'],
            $array['total_amount'],
        );

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'start_parameter' => $this->startParameter,
            'currency' => $this->currency,
            'total_amount' => $this->totalAmount,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
