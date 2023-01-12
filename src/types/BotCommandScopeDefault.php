<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents the default [scope](https://core.telegram.org/bots/api#botcommandscope) of bot commands. Default commands
 * are used if no commands with a [narrower scope](https://core.telegram.org/bots/api#determining-list-of-commands) are
 * specified for the user.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#botcommandscopedefault
 */
class BotCommandScopeDefault extends BotCommandScope implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private string $type)
    {
    }

    /**
     * @param string $type Scope type, must be *default*
     */
    public static function new(string $type): self
    {
        return new self($type);
    }

    /**
     * Scope type, must be *default*
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
