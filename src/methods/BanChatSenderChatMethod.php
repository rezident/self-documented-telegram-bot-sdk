<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to ban a channel chat in a supergroup or a channel. Until the chat is
 * [unbanned](https://core.telegram.org/bots/api#unbanchatsenderchat), the owner of the banned chat won't be able to
 * send messages on behalf of **any of their channels**. The bot must be an administrator in the supergroup or channel
 * for this to work and must have the appropriate administrator rights. Returns *True* on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#banchatsenderchat
 */
class BanChatSenderChatMethod implements ToArrayInterface
{
    private function __construct(private int|string $chatId, private int $senderChatId)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     *                           `@channelusername`)
     * @param int $senderChatId Unique identifier of the target sender chat
     */
    public static function new(int|string $chatId, int $senderChatId): self
    {
        return new self($chatId, $senderChatId);
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'sender_chat_id' => $this->senderChatId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
