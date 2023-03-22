<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Message;

/**
 * Use this method to forward messages of any kind. Service messages can't be forwarded. On success, the sent
 * [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#forwardmessage
 */
class ForwardMessageMethod implements ToArrayInterface
{
    private ?int $messageThreadId = null;

    private ?bool $disableNotification = null;

    private ?bool $protectContent = null;

    private function __construct(private int|string $chatId, private int|string $fromChatId, private int $messageId)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     *                           `@channelusername`)
     * @param int|string $fromChatId Unique identifier for the chat where the original message was sent (or channel
     *                               username in the format `@channelusername`)
     * @param int $messageId Message identifier in the chat specified in *from\_chat\_id*
     */
    public static function new(int|string $chatId, int|string $fromChatId, int $messageId): self
    {
        return new self($chatId, $fromChatId, $messageId);
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
     * Protects the contents of the forwarded message from forwarding and saving
     */
    public function protectContent(?bool $protectContent): self
    {
        $this->protectContent = $protectContent;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'message_thread_id' => $this->messageThreadId,
            'from_chat_id' => $this->fromChatId,
            'disable_notification' => $this->disableNotification,
            'protect_content' => $this->protectContent,
            'message_id' => $this->messageId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): Message
    {
        return Message::fromArray($executor->execute($this));
    }
}
