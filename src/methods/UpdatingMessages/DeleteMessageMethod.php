<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\UpdatingMessages;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to delete a message, including service messages, with the following limitations:
 *
 * \- A message can only be deleted if it was sent less than 48 hours ago.
 *
 * \- Service messages about a supergroup, channel, or forum topic creation can't be deleted.
 *
 * \- A dice message in a private chat can only be deleted if it was sent more than 24 hours ago.
 *
 * \- Bots can delete outgoing messages in private chats, groups, and supergroups.
 *
 * \- Bots can delete incoming messages in private chats.
 *
 * \- Bots granted *can\_post\_messages* permissions can delete outgoing messages in channels.
 *
 * \- If the bot is an administrator of a group, it can delete any message there.
 *
 * \- If the bot has *can\_delete\_messages* permission in a supergroup or a channel, it can delete any message there.
 *
 * Returns *True* on success.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#deletemessage
 */
class DeleteMessageMethod implements ToArrayInterface
{
    private function __construct(private int|string $chatId, private int $messageId)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     *                           `@channelusername`)
     * @param int $messageId Identifier of the message to delete
     */
    public static function new(int|string $chatId, int $messageId): self
    {
        return new self($chatId, $messageId);
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'message_id' => $this->messageId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
