<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents an incoming callback query from a callback button in an
 * [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards). If the button that originated the query
 * was attached to a message sent by the bot, the field *message* will be present. If the button was attached to a
 * message sent via the bot (in [inline mode](https://core.telegram.org/bots/api#inline-mode)), the field
 * *inline\_message\_id* will be present. Exactly one of the fields *data* or *game\_short\_name* will be present.
 *
 * > **NOTE:** After the user presses a callback button, Telegram clients will display a progress bar until you call
 * [answerCallbackQuery](https://core.telegram.org/bots/api#answercallbackquery). It is, therefore, necessary to react
 * by calling [answerCallbackQuery](https://core.telegram.org/bots/api#answercallbackquery) even if no notification to
 * the user is needed (e.g., without specifying any of the optional parameters).
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#callbackquery
 */
class CallbackQuery implements FromArrayInterface, ToArrayInterface
{
    private ?Message $message = null;

    private ?string $inlineMessageId = null;

    private ?string $data = null;

    private ?string $gameShortName = null;

    private function __construct(private string $id, private User $from, private string $chatInstance)
    {
    }

    /**
     * @param string $id Unique identifier for this query
     * @param User $from Sender
     * @param string $chatInstance Global identifier, uniquely corresponding to the chat to which the message with the
     *                             callback button was sent. Useful for high scores in
     *                             [games](https://core.telegram.org/bots/api#games).
     */
    public static function new(string $id, User $from, string $chatInstance): self
    {
        return new self($id, $from, $chatInstance);
    }

    /**
     * Message with the callback button that originated the query. Note that message content and message date will not
     * be available if the message is too old
     */
    public function message(?Message $message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Identifier of the message sent via the bot in inline mode, that originated the query.
     */
    public function inlineMessageId(?string $inlineMessageId): self
    {
        $this->inlineMessageId = $inlineMessageId;
        return $this;
    }

    /**
     * Data associated with the callback button. Be aware that the message originated the query can contain no callback
     * buttons with this data.
     */
    public function data(?string $data): self
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Short name of a [Game](https://core.telegram.org/bots/api#games) to be returned, serves as the unique identifier
     * for the game
     */
    public function gameShortName(?string $gameShortName): self
    {
        $this->gameShortName = $gameShortName;
        return $this;
    }

    /**
     * Unique identifier for this query
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sender
     */
    public function getFrom(): ?User
    {
        return $this->from;
    }

    /**
     * Message with the callback button that originated the query. Note that message content and message date will not
     * be available if the message is too old
     */
    public function getMessage(): ?Message
    {
        return $this->message;
    }

    /**
     * Identifier of the message sent via the bot in inline mode, that originated the query.
     */
    public function getInlineMessageId(): ?string
    {
        return $this->inlineMessageId;
    }

    /**
     * Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent.
     * Useful for high scores in [games](https://core.telegram.org/bots/api#games).
     */
    public function getChatInstance(): ?string
    {
        return $this->chatInstance;
    }

    /**
     * Data associated with the callback button. Be aware that the message originated the query can contain no callback
     * buttons with this data.
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * Short name of a [Game](https://core.telegram.org/bots/api#games) to be returned, serves as the unique identifier
     * for the game
     */
    public function getGameShortName(): ?string
    {
        return $this->gameShortName;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['id'], User::fromArray($array['from']), $array['chat_instance']);

        $instance->message = Message::fromArray($array['message'] ?? null);
        $instance->inlineMessageId = $array['inline_message_id'] ?? null;
        $instance->data = $array['data'] ?? null;
        $instance->gameShortName = $array['game_short_name'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'id' => $this->id,
            'from' => $this->from,
            'message' => $this->message,
            'inline_message_id' => $this->inlineMessageId,
            'chat_instance' => $this->chatInstance,
            'data' => $this->data,
            'game_short_name' => $this->gameShortName,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
