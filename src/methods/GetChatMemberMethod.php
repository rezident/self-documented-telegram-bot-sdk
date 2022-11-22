<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\ChatMember;

/**
 * Use this method to get information about a member of a chat. Returns a
 * [ChatMember](https://core.telegram.org/bots/api#chatmember) object on success.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#getchatmember
 */
class GetChatMemberMethod implements ToArrayInterface
{
    private function __construct(private int|string $chatId, private int $userId)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup or channel
     *                           (in the format `@channelusername`)
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

    public function exec(Executable $executor): ChatMember
    {
        return ChatMember::fromArray($executor->execute($this));
    }
}
