<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object describes the bot's menu button in a private chat. It should be one of
 *
 * - [MenuButtonCommands](https://core.telegram.org/bots/api#menubuttoncommands)
 *
 * - [MenuButtonWebApp](https://core.telegram.org/bots/api#menubuttonwebapp)
 *
 * - [MenuButtonDefault](https://core.telegram.org/bots/api#menubuttondefault)
 *
 * If a menu button other than [MenuButtonDefault](https://core.telegram.org/bots/api#menubuttondefault) is set for a
 * private chat, then it is applied in the chat. Otherwise the default menu button is applied. By default, the menu
 * button opens the list of bot commands.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#menubutton
 */
class MenuButton implements FromArrayInterface, ToArrayInterface
{
    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self();

        return $instance;
    }

    public function toArray(): array
    {
        return [];
    }
}
