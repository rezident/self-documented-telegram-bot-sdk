<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to clear the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an
 * administrator in the chat for this to work and must have the 'can\_pin\_messages' administrator right in a supergroup
 * or 'can\_edit\_messages' administrator right in a channel. Returns *True* on success.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#unpinallchatmessages
 */
class UnpinAllChatMessagesMethod implements ToArrayInterface
{
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

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
