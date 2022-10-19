<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents the [scope](https://core.telegram.org/bots/api#botcommandscope) of bot commands, covering all
 * administrators of a specific group or supergroup chat.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#botcommandscopechatadministrators
 */
class BotCommandScopeChatAdministrators extends BotCommandScope implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private string $type, private int|string $chatId)
    {
    }

    /**
     * @param string $type Scope type, must be *chat\_administrators*
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the
     *                           format `@supergroupusername`)
     */
    public static function new(string $type, int|string $chatId): self
    {
        return new self($type, $chatId);
    }

    /**
     * Scope type, must be *chat\_administrators*
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

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['type'], $array['chat_id']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'type' => $this->type,
            'chat_id' => $this->chatId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
