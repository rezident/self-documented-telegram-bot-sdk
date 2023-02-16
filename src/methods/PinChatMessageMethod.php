<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to add a message to the list of pinned messages in a chat. If the chat is not a private chat, the bot
 * must be an administrator in the chat for this to work and must have the 'can\_pin\_messages' administrator right in a
 * supergroup or 'can\_edit\_messages' administrator right in a channel. Returns *True* on success.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#pinchatmessage
 */
class PinChatMessageMethod implements ToArrayInterface
{
    private ?bool $disableNotification = null;

    private function __construct(private int|string $chatId, private int $messageId)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     *                           `@channelusername`)
     * @param int $messageId Identifier of a message to pin
     */
    public static function new(int|string $chatId, int $messageId): self
    {
        return new self($chatId, $messageId);
    }

    /**
     * Pass *True* if it is not necessary to send a notification to all chat members about the new pinned message.
     * Notifications are always disabled in channels and private chats.
     */
    public function disableNotification(?bool $disableNotification): self
    {
        $this->disableNotification = $disableNotification;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'message_id' => $this->messageId,
            'disable_notification' => $this->disableNotification,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
