<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\ChatInviteLink;

/**
 * Use this method to edit a non-primary invite link created by the bot. The bot must be an administrator in the chat
 * for this to work and must have the appropriate administrator rights. Returns the edited invite link as a
 * [ChatInviteLink](https://core.telegram.org/bots/api#chatinvitelink) object.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#editchatinvitelink
 */
class EditChatInviteLinkMethod implements ToArrayInterface
{
    private ?string $name = null;

    private ?int $expireDate = null;

    private ?int $memberLimit = null;

    private ?bool $createsJoinRequest = null;

    private function __construct(private int|string $chatId, private string $inviteLink)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     *                           `@channelusername`)
     * @param string $inviteLink The invite link to edit
     */
    public static function new(int|string $chatId, string $inviteLink): self
    {
        return new self($chatId, $inviteLink);
    }

    /**
     * Invite link name; 0-32 characters
     */
    public function name(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Point in time (Unix timestamp) when the link will expire
     */
    public function expireDate(?int $expireDate): self
    {
        $this->expireDate = $expireDate;
        return $this;
    }

    /**
     * The maximum number of users that can be members of the chat simultaneously after joining the chat via this
     * invite link; 1-99999
     */
    public function memberLimit(?int $memberLimit): self
    {
        $this->memberLimit = $memberLimit;
        return $this;
    }

    /**
     * *True*, if users joining the chat via the link need to be approved by chat administrators. If *True*,
     * *member\_limit* can't be specified
     */
    public function createsJoinRequest(?bool $createsJoinRequest): self
    {
        $this->createsJoinRequest = $createsJoinRequest;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'invite_link' => $this->inviteLink,
            'name' => $this->name,
            'expire_date' => $this->expireDate,
            'member_limit' => $this->memberLimit,
            'creates_join_request' => $this->createsJoinRequest,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): ChatInviteLink
    {
        return ChatInviteLink::fromArray($executor->execute($this));
    }
}
