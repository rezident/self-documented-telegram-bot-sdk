<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Payments;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfShippingOption;

/**
 * If you sent an invoice requesting a shipping address and the parameter *is\_flexible* was specified, the Bot API will
 * send an [Update](https://core.telegram.org/bots/api#update) with a *shipping\_query* field to the bot. Use this
 * method to reply to shipping queries. On success, *True* is returned.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#answershippingquery
 */
class AnswerShippingQueryMethod implements ToArrayInterface
{
    private ?ArrayOfShippingOption $shippingOptions = null;

    private ?string $errorMessage = null;

    private function __construct(private string $shippingQueryId, private bool $ok)
    {
    }

    /**
     * @param string $shippingQueryId Unique identifier for the query to be answered
     * @param bool $ok Pass *True* if delivery to the specified address is possible and *False* if there are any
     *                 problems (for example, if delivery to the specified address is not possible)
     */
    public static function new(string $shippingQueryId, bool $ok): self
    {
        return new self($shippingQueryId, $ok);
    }

    /**
     * Required if *ok* is *True*. A JSON-serialized array of available shipping options.
     */
    public function shippingOptions(?ArrayOfShippingOption $shippingOptions): self
    {
        $this->shippingOptions = $shippingOptions;
        return $this;
    }

    /**
     * Required if *ok* is *False*. Error message in human readable form that explains why it is impossible to complete
     * the order (e.g. "Sorry, delivery to your desired address is unavailable'). Telegram will display this message to
     * the user.
     */
    public function errorMessage(?string $errorMessage): self
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'shipping_query_id' => $this->shippingQueryId,
            'ok' => $this->ok,
            'shipping_options' => $this->shippingOptions,
            'error_message' => $this->errorMessage,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
