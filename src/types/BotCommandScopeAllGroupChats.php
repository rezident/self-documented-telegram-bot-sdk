<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents the [scope](https://core.telegram.org/bots/api#botcommandscope) of bot commands, covering all group and
 * supergroup chats.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#botcommandscopeallgroupchats
 */
class BotCommandScopeAllGroupChats extends BotCommandScope implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private string $type)
    {
    }

    /**
     * @param string $type Scope type, must be *all\_group\_chats*
     */
    public static function new(string $type): self
    {
        return new self($type);
    }

    /**
     * Scope type, must be *all\_group\_chats*
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['type']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'type' => $this->type,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
