<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\UpdatingMessages;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfMessageEntity;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineKeyboardMarkup;
use Rezident\SelfDocumentedTelegramBotSdk\types\Message;

/**
 * Use this method to edit text and [game](https://core.telegram.org/bots/api#games) messages. On success, if the edited
 * message is not an inline message, the edited [Message](https://core.telegram.org/bots/api#message) is returned,
 * otherwise *True* is returned.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#editmessagetext
 */
class EditMessageTextMethod implements ToArrayInterface
{
    private int|string|null $chatId = null;

    private ?int $messageId = null;

    private ?string $inlineMessageId = null;

    private ?string $parseMode = null;

    private ?ArrayOfMessageEntity $entities = null;

    private ?bool $disableWebPagePreview = null;

    private ?InlineKeyboardMarkup $replyMarkup = null;

    private function __construct(private string $text)
    {
    }

    /**
     * @param string $text New text of the message, 1-4096 characters after entities parsing
     */
    public static function new(string $text): self
    {
        return new self($text);
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
     * Required if *inline\_message\_id* is not specified. Identifier of the message to edit
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
     * Mode for parsing entities in the message text. See
     * [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details.
     */
    public function parseMode(?string $parseMode): self
    {
        $this->parseMode = $parseMode;
        return $this;
    }

    /**
     * A JSON-serialized list of special entities that appear in message text, which can be specified instead of
     * *parse\_mode*
     */
    public function entities(?ArrayOfMessageEntity $entities): self
    {
        $this->entities = $entities;
        return $this;
    }

    /**
     * Disables link previews for links in this message
     */
    public function disableWebPagePreview(?bool $disableWebPagePreview): self
    {
        $this->disableWebPagePreview = $disableWebPagePreview;
        return $this;
    }

    /**
     * A JSON-serialized object for an
     * [inline keyboard](https://core.telegram.org/bots#inline-keyboards-and-on-the-fly-updating).
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
            'text' => $this->text,
            'parse_mode' => $this->parseMode,
            'entities' => $this->entities,
            'disable_web_page_preview' => $this->disableWebPagePreview,
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
