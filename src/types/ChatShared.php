<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object contains information about the chat whose identifier was shared with the bot using a
 * [KeyboardButtonRequestChat](https://core.telegram.org/bots/api#keyboardbuttonrequestchat) button.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#chatshared
 */
class ChatShared implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private int $requestId, private int $chatId)
    {
    }

    /**
     * @param int $requestId Identifier of the request
     * @param int $chatId Identifier of the shared chat. This number may have more than 32 significant bits and some
     *                    programming languages may have difficulty/silent defects in interpreting it. But it has at
     *                    most 52 significant bits, so a 64-bit integer or double-precision float type are safe for
     *                    storing this identifier. The bot may not have access to the chat and could be unable to use
     *                    this identifier, unless the chat is already known to the bot by some other means.
     */
    public static function new(int $requestId, int $chatId): self
    {
        return new self($requestId, $chatId);
    }

    /**
     * Identifier of the request
     */
    public function getRequestId(): ?int
    {
        return $this->requestId;
    }

    /**
     * Identifier of the shared chat. This number may have more than 32 significant bits and some programming languages
     * may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit
     * integer or double-precision float type are safe for storing this identifier. The bot may not have access to the
     * chat and could be unable to use this identifier, unless the chat is already known to the bot by some other
     * means.
     */
    public function getChatId(): ?int
    {
        return $this->chatId;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['request_id'], $array['chat_id']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'request_id' => $this->requestId,
            'chat_id' => $this->chatId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
