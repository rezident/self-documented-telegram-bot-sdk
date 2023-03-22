<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to decline a chat join request. The bot must be an administrator in the chat for this to work and
 * must have the *can\_invite\_users* administrator right. Returns *True* on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#declinechatjoinrequest
 */
class DeclineChatJoinRequestMethod implements ToArrayInterface
{
    private function __construct(private int|string $chatId, private int $userId)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     *                           `@channelusername`)
     * @param int $userId Unique identifier of the target user
     */
    public static function new(int|string $chatId, int $userId): self
    {
        return new self($chatId, $userId);
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'user_id' => $this->userId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
