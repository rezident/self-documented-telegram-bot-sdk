<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents the content of a message to be sent as a result of an inline query. Telegram clients currently
 * support the following 5 types:
 *
 * - [InputTextMessageContent](https://core.telegram.org/bots/api#inputtextmessagecontent)
 *
 * - [InputLocationMessageContent](https://core.telegram.org/bots/api#inputlocationmessagecontent)
 *
 * - [InputVenueMessageContent](https://core.telegram.org/bots/api#inputvenuemessagecontent)
 *
 * - [InputContactMessageContent](https://core.telegram.org/bots/api#inputcontactmessagecontent)
 *
 * - [InputInvoiceMessageContent](https://core.telegram.org/bots/api#inputinvoicemessagecontent)
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inputmessagecontent
 */
class InputMessageContent implements FromArrayInterface, ToArrayInterface
{
    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self();

        return $instance;
    }

    public function toArray(): array
    {
        return [];
    }
}
