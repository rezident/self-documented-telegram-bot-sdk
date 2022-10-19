<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Payments;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfLabeledPrice;

/**
 * This object represents one shipping option.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#shippingoption
 */
class ShippingOption implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private string $id, private string $title, private ArrayOfLabeledPrice $prices)
    {
    }

    /**
     * @param string $id Shipping option identifier
     * @param string $title Option title
     * @param ArrayOfLabeledPrice $prices List of price portions
     */
    public static function new(string $id, string $title, ArrayOfLabeledPrice $prices): self
    {
        return new self($id, $title, $prices);
    }

    /**
     * Shipping option identifier
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Option title
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * List of price portions
     */
    public function getPrices(): ?ArrayOfLabeledPrice
    {
        return $this->prices;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['id'], $array['title'], ArrayOfLabeledPrice::fromArray($array['prices']));

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'id' => $this->id,
            'title' => $this->title,
            'prices' => $this->prices,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
