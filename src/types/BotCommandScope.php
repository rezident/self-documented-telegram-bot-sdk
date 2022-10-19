<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents the scope to which bot commands are applied. Currently, the following 7 scopes are supported:
 *
 * - [BotCommandScopeDefault](https://core.telegram.org/bots/api#botcommandscopedefault)
 *
 * - [BotCommandScopeAllPrivateChats](https://core.telegram.org/bots/api#botcommandscopeallprivatechats)
 *
 * - [BotCommandScopeAllGroupChats](https://core.telegram.org/bots/api#botcommandscopeallgroupchats)
 *
 * - [BotCommandScopeAllChatAdministrators](https://core.telegram.org/bots/api#botcommandscopeallchatadministrators)
 *
 * - [BotCommandScopeChat](https://core.telegram.org/bots/api#botcommandscopechat)
 *
 * - [BotCommandScopeChatAdministrators](https://core.telegram.org/bots/api#botcommandscopechatadministrators)
 *
 * - [BotCommandScopeChatMember](https://core.telegram.org/bots/api#botcommandscopechatmember)
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#botcommandscope
 */
class BotCommandScope implements FromArrayInterface, ToArrayInterface
{
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
