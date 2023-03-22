<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\ChatInviteLink;

/**
 * Use this method to revoke an invite link created by the bot. If the primary link is revoked, a new link is
 * automatically generated. The bot must be an administrator in the chat for this to work and must have the appropriate
 * administrator rights. Returns the revoked invite link as
 * [ChatInviteLink](https://core.telegram.org/bots/api#chatinvitelink) object.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#revokechatinvitelink
 */
class RevokeChatInviteLinkMethod implements ToArrayInterface
{
    private function __construct(private int|string $chatId, private string $inviteLink)
    {
    }

    /**
     * @param int|string $chatId Unique identifier of the target chat or username of the target channel (in the format
     *                           `@channelusername`)
     * @param string $inviteLink The invite link to revoke
     */
    public static function new(int|string $chatId, string $inviteLink): self
    {
        return new self($chatId, $inviteLink);
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'invite_link' => $this->inviteLink,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): ChatInviteLink
    {
        return ChatInviteLink::fromArray($executor->execute($this));
    }
}
