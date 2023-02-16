<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfChatMember;

/**
 * Use this method to get a list of administrators in a chat, which aren't bots. Returns an Array of
 * [ChatMember](https://core.telegram.org/bots/api#chatmember) objects.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#getchatadministrators
 */
class GetChatAdministratorsMethod implements ToArrayInterface
{
    private function __construct(private int|string $chatId)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup or channel
     *                           (in the format `@channelusername`)
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

    public function exec(Executable $executor): ArrayOfChatMember
    {
        return ArrayOfChatMember::fromArray($executor->execute($this));
    }
}
