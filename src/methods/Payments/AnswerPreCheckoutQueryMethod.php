<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Payments;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Once the user has confirmed their payment and shipping details, the Bot API sends the final confirmation in the form
 * of an [Update](https://core.telegram.org/bots/api#update) with the field *pre\_checkout\_query*. Use this method to
 * respond to such pre-checkout queries. On success, *True* is returned. **Note:** The Bot API must receive an answer
 * within 10 seconds after the pre-checkout query was sent.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#answerprecheckoutquery
 */
class AnswerPreCheckoutQueryMethod implements ToArrayInterface
{
    private ?string $errorMessage = null;

    private function __construct(private string $preCheckoutQueryId, private bool $ok)
    {
    }

    /**
     * @param string $preCheckoutQueryId Unique identifier for the query to be answered
     * @param bool $ok Specify *True* if everything is alright (goods are available, etc.) and the bot is ready to
     *                 proceed with the order. Use *False* if there are any problems.
     */
    public static function new(string $preCheckoutQueryId, bool $ok): self
    {
        return new self($preCheckoutQueryId, $ok);
    }

    /**
     * Required if *ok* is *False*. Error message in human readable form that explains the reason for failure to
     * proceed with the checkout (e.g. "Sorry, somebody just bought the last of our amazing black T-shirts while you
     * were busy filling out your payment details. Please choose a different color or garment!"). Telegram will display
     * this message to the user.
     */
    public function errorMessage(?string $errorMessage): self
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'pre_checkout_query_id' => $this->preCheckoutQueryId,
            'ok' => $this->ok,
            'error_message' => $this->errorMessage,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
