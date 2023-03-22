<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\UpdatingMessages;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineKeyboardMarkup;
use Rezident\SelfDocumentedTelegramBotSdk\types\Message;

/**
 * Use this method to stop updating a live location message before *live\_period* expires. On success, if the message is
 * not an inline message, the edited [Message](https://core.telegram.org/bots/api#message) is returned, otherwise *True*
 * is returned.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#stopmessagelivelocation
 */
class StopMessageLiveLocationMethod implements ToArrayInterface
{
    private int|string|null $chatId = null;

    private ?int $messageId = null;

    private ?string $inlineMessageId = null;

    private ?InlineKeyboardMarkup $replyMarkup = null;

    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    /**
     * Required if *inline\_message\_id* is not specified. Unique identifier for the target chat or username of the
     * target channel (in the format `@channelusername`)
     */
    public function chatId(int|string|null $chatId): self
    {
        $this->chatId = $chatId;
        return $this;
    }

    /**
     * Required if *inline\_message\_id* is not specified. Identifier of the message with live location to stop
     */
    public function messageId(?int $messageId): self
    {
        $this->messageId = $messageId;
        return $this;
    }

    /**
     * Required if *chat\_id* and *message\_id* are not specified. Identifier of the inline message
     */
    public function inlineMessageId(?string $inlineMessageId): self
    {
        $this->inlineMessageId = $inlineMessageId;
        return $this;
    }

    /**
     * A JSON-serialized object for a new [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards).
     */
    public function replyMarkup(?InlineKeyboardMarkup $replyMarkup): self
    {
        $this->replyMarkup = $replyMarkup;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'message_id' => $this->messageId,
            'inline_message_id' => $this->inlineMessageId,
            'reply_markup' => $this->replyMarkup,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): Message|bool
    {
        $result = $executor->execute($this);
        return is_array($result) ? Message::fromArray($result) : $result;
    }
}
