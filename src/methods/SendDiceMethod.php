<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ReplyMarkup;
use Rezident\SelfDocumentedTelegramBotSdk\types\Message;

/**
 * Use this method to send an animated emoji that will display a random value. On success, the sent
 * [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#senddice
 */
class SendDiceMethod implements ToArrayInterface
{
    private ?int $messageThreadId = null;

    private ?string $emoji = null;

    private ?bool $disableNotification = null;

    private ?bool $protectContent = null;

    private ?int $replyToMessageId = null;

    private ?bool $allowSendingWithoutReply = null;

    private ?ReplyMarkup $replyMarkup = null;

    private function __construct(private int|string $chatId)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     *                           `@channelusername`)
     */
    public static function new(int|string $chatId): self
    {
        return new self($chatId);
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
     * Emoji on which the dice throw animation is based. Currently, must be one of
     * “![🎲](https://core.telegram.org//telegram.org/img/emoji/40/F09F8EB2.png)”,
     * “![🎯](https://core.telegram.org//telegram.org/img/emoji/40/F09F8EAF.png)”,
     * “![🏀](https://core.telegram.org//telegram.org/img/emoji/40/F09F8F80.png)”,
     * “![⚽](https://core.telegram.org//telegram.org/img/emoji/40/E29ABD.png)”,
     * “![🎳](https://core.telegram.org//telegram.org/img/emoji/40/F09F8EB3.png)”, or
     * “![🎰](https://core.telegram.org//telegram.org/img/emoji/40/F09F8EB0.png)”. Dice can have values 1-6 for
     * “![🎲](https://core.telegram.org//telegram.org/img/emoji/40/F09F8EB2.png)”,
     * “![🎯](https://core.telegram.org//telegram.org/img/emoji/40/F09F8EAF.png)” and
     * “![🎳](https://core.telegram.org//telegram.org/img/emoji/40/F09F8EB3.png)”, values 1-5 for
     * “![🏀](https://core.telegram.org//telegram.org/img/emoji/40/F09F8F80.png)” and
     * “![⚽](https://core.telegram.org//telegram.org/img/emoji/40/E29ABD.png)”, and values 1-64 for
     * “![🎰](https://core.telegram.org//telegram.org/img/emoji/40/F09F8EB0.png)”. Defaults to
     * “![🎲](https://core.telegram.org//telegram.org/img/emoji/40/F09F8EB2.png)”
     */
    public function emoji(?string $emoji): self
    {
        $this->emoji = $emoji;
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
     * Protects the contents of the sent message from forwarding
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
     * Additional interface options. A JSON-serialized object for an
     * [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards),
     * [custom reply keyboard](https://core.telegram.org/bots/features#keyboards), instructions to remove reply
     * keyboard or to force a reply from the user.
     */
    public function replyMarkup(?ReplyMarkup $replyMarkup): self
    {
        $this->replyMarkup = $replyMarkup;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'message_thread_id' => $this->messageThreadId,
            'emoji' => $this->emoji,
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
