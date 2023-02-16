<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfMediaGroupInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfMessage;

/**
 * Use this method to send a group of photos, videos, documents or audios as an album. Documents and audio files can be
 * only grouped in an album with messages of the same type. On success, an array of
 * [Messages](https://core.telegram.org/bots/api#message) that were sent is returned.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#sendmediagroup
 */
class SendMediaGroupMethod implements ToArrayInterface
{
    private ?int $messageThreadId = null;

    private ?bool $disableNotification = null;

    private ?bool $protectContent = null;

    private ?int $replyToMessageId = null;

    private ?bool $allowSendingWithoutReply = null;

    private function __construct(private int|string $chatId, private ArrayOfMediaGroupInterface $media)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     *                           `@channelusername`)
     * @param ArrayOfMediaGroupInterface $media A JSON-serialized array describing messages to be sent, must include
     *                                          2-10 items
     */
    public static function new(int|string $chatId, ArrayOfMediaGroupInterface $media): self
    {
        return new self($chatId, $media);
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
     * Sends messages [silently](https://telegram.org/blog/channels-2-0#silent-messages). Users will receive a
     * notification with no sound.
     */
    public function disableNotification(?bool $disableNotification): self
    {
        $this->disableNotification = $disableNotification;
        return $this;
    }

    /**
     * Protects the contents of the sent messages from forwarding and saving
     */
    public function protectContent(?bool $protectContent): self
    {
        $this->protectContent = $protectContent;
        return $this;
    }

    /**
     * If the messages are a reply, ID of the original message
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

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'message_thread_id' => $this->messageThreadId,
            'media' => $this->media,
            'disable_notification' => $this->disableNotification,
            'protect_content' => $this->protectContent,
            'reply_to_message_id' => $this->replyToMessageId,
            'allow_sending_without_reply' => $this->allowSendingWithoutReply,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): ArrayOfMessage
    {
        return ArrayOfMessage::fromArray($executor->execute($this));
    }
}
