<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Payments;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a portion of the price for goods or services.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#labeledprice
 */
class LabeledPrice implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private string $label, private int $amount)
    {
    }

    /**
     * @param string $label Portion label
     * @param int $amount Price of the product in the *smallest units* of the
     *                    [currency](https://core.telegram.org/bots/payments#supported-currencies) (integer, **not**
     *                    float/double). For example, for a price of `US$ 1.45` pass `amount = 145`. See the *exp*
     *                    parameter in [currencies.json](https://core.telegram.org/bots/payments/currencies.json), it
     *                    shows the number of digits past the decimal point for each currency (2 for the majority of
     *                    currencies).
     */
    public static function new(string $label, int $amount): self
    {
        return new self($label, $amount);
    }

    /**
     * Portion label
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * Price of the product in the *smallest units* of the
     * [currency](https://core.telegram.org/bots/payments#supported-currencies) (integer, **not** float/double). For
     * example, for a price of `US$ 1.45` pass `amount = 145`. See the *exp* parameter in
     * [currencies.json](https://core.telegram.org/bots/payments/currencies.json), it shows the number of digits past
     * the decimal point for each currency (2 for the majority of currencies).
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['label'], $array['amount']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'label' => $this->label,
            'amount' => $this->amount,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
