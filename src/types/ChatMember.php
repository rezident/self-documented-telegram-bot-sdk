<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object contains information about one member of a chat. Currently, the following 6 types of chat members are
 * supported:
 *
 * - [ChatMemberOwner](https://core.telegram.org/bots/api#chatmemberowner)
 *
 * - [ChatMemberAdministrator](https://core.telegram.org/bots/api#chatmemberadministrator)
 *
 * - [ChatMemberMember](https://core.telegram.org/bots/api#chatmembermember)
 *
 * - [ChatMemberRestricted](https://core.telegram.org/bots/api#chatmemberrestricted)
 *
 * - [ChatMemberLeft](https://core.telegram.org/bots/api#chatmemberleft)
 *
 * - [ChatMemberBanned](https://core.telegram.org/bots/api#chatmemberbanned)
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#chatmember
 */
class ChatMember implements FromArrayInterface, ToArrayInterface
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
