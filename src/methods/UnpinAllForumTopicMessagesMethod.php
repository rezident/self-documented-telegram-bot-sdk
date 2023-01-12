<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to clear the list of pinned messages in a forum topic. The bot must be an administrator in the chat
 * for this to work and must have the *can\_pin\_messages* administrator right in the supergroup. Returns *True* on
 * success.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#unpinallforumtopicmessages
 */
class UnpinAllForumTopicMessagesMethod implements ToArrayInterface
{
    private function __construct(private int|string $chatId, private int $messageThreadId)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the
     *                           format `@supergroupusername`)
     * @param int $messageThreadId Unique identifier for the target message thread of the forum topic
     */
    public static function new(int|string $chatId, int $messageThreadId): self
    {
        return new self($chatId, $messageThreadId);
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'message_thread_id' => $this->messageThreadId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
