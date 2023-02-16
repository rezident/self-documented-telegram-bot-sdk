<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Games;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineKeyboardMarkup;
use Rezident\SelfDocumentedTelegramBotSdk\types\Message;

/**
 * Use this method to send a game. On success, the sent [Message](https://core.telegram.org/bots/api#message) is
 * returned.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#sendgame
 */
class SendGameMethod implements ToArrayInterface
{
    private ?int $messageThreadId = null;

    private ?bool $disableNotification = null;

    private ?bool $protectContent = null;

    private ?int $replyToMessageId = null;

    private ?bool $allowSendingWithoutReply = null;

    private ?InlineKeyboardMarkup $replyMarkup = null;

    private function __construct(private int $chatId, private string $gameShortName)
    {
    }

    /**
     * @param int $chatId Unique identifier for the target chat
     * @param string $gameShortName Short name of the game, serves as the unique identifier for the game. Set up your
     *                              games via [@BotFather](https://t.me/botfather).
     */
    public static function new(int $chatId, string $gameShortName): self
    {
        return new self($chatId, $gameShortName);
    }

    /**
     * Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     */
    public function messageThreadId(?int $messageThreadId): self
    {
        $this->messageThreadId = $messageThreadId;
        return $this;
    }

    /**
     * Sends the message [silently](https://telegram.org/blog/channels-2-0#silent-messages). Users will receive a
     * notification with no sound.
     */
    public function disableNotification(?bool $disableNotification): self
    {
        $this->disableNotification = $disableNotification;
        return $this;
    }

    /**
     * Protects the contents of the sent message from forwarding and saving
     */
    public function protectContent(?bool $protectContent): self
    {
        $this->protectContent = $protectContent;
        return $this;
    }

    /**
     * If the message is a reply, ID of the original message
     */
    public function replyToMessageId(?int $replyToMessageId): self
    {
        $this->replyToMessageId = $replyToMessageId;
        return $this;
    }

    /**
     * Pass *True* if the message should be sent even if the specified replied-to message is not found
     */
    public function allowSendingWithoutReply(?bool $allowSendingWithoutReply): self
    {
        $this->allowSendingWithoutReply = $allowSendingWithoutReply;
        return $this;
    }

    /**
     * A JSON-serialized object for an [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards). If
     * empty, one 'Play game\_title' button will be shown. If not empty, the first button must launch the game.
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
            'message_thread_id' => $this->messageThreadId,
            'game_short_name' => $this->gameShortName,
            'disable_notification' => $this->disableNotification,
            'protect_content' => $this->protectContent,
            'reply_to_message_id' => $this->replyToMessageId,
            'allow_sending_without_reply' => $this->allowSendingWithoutReply,
            'reply_markup' => $this->replyMarkup,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): Message
    {
        return Message::fromArray($executor->execute($this));
    }
}
