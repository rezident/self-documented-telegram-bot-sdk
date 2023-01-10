<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents the [scope](https://core.telegram.org/bots/api#botcommandscope) of bot commands, covering a specific
 * member of a group or supergroup chat.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#botcommandscopechatmember
 */
class BotCommandScopeChatMember extends BotCommandScope implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private string $type, private int|string $chatId, private int $userId)
    {
    }

    /**
     * @param string $type Scope type, must be *chat\_member*
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the
     *                           format `@supergroupusername`)
     * @param int $userId Unique identifier of the target user
     */
    public static function new(string $type, int|string $chatId, int $userId): self
    {
        return new self($type, $chatId, $userId);
    }

    /**
     * Scope type, must be *chat\_member*
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Unique identifier for the target chat or username of the target supergroup (in the format `@supergroupusername`)
     */
    public function getChatId(): int|string|null
    {
        return $this->chatId;
    }

    /**
     * Unique identifier of the target user
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['type'], $array['chat_id'], $array['user_id']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'type' => $this->type,
            'chat_id' => $this->chatId,
            'user_id' => $this->userId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
