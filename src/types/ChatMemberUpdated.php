<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents changes in the status of a chat member.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#chatmemberupdated
 */
class ChatMemberUpdated implements FromArrayInterface, ToArrayInterface
{
    private ?ChatInviteLink $inviteLink = null;

    private function __construct(
        private Chat $chat,
        private User $from,
        private int $date,
        private ChatMember $oldChatMember,
        private ChatMember $newChatMember
    ) {
    }

    /**
     * @param Chat $chat Chat the user belongs to
     * @param User $from Performer of the action, which resulted in the change
     * @param int $date Date the change was done in Unix time
     * @param ChatMember $oldChatMember Previous information about the chat member
     * @param ChatMember $newChatMember New information about the chat member
     */
    public static function new(
        Chat $chat,
        User $from,
        int $date,
        ChatMember $oldChatMember,
        ChatMember $newChatMember,
    ): self {
        return new self($chat, $from, $date, $oldChatMember, $newChatMember);
    }

    /**
     * Chat invite link, which was used by the user to join the chat; for joining by invite link events only.
     */
    public function inviteLink(?ChatInviteLink $inviteLink): self
    {
        $this->inviteLink = $inviteLink;
        return $this;
    }

    /**
     * Chat the user belongs to
     */
    public function getChat(): ?Chat
    {
        return $this->chat;
    }

    /**
     * Performer of the action, which resulted in the change
     */
    public function getFrom(): ?User
    {
        return $this->from;
    }

    /**
     * Date the change was done in Unix time
     */
    public function getDate(): ?int
    {
        return $this->date;
    }

    /**
     * Previous information about the chat member
     */
    public function getOldChatMember(): ?ChatMember
    {
        return $this->oldChatMember;
    }

    /**
     * New information about the chat member
     */
    public function getNewChatMember(): ?ChatMember
    {
        return $this->newChatMember;
    }

    /**
     * Chat invite link, which was used by the user to join the chat; for joining by invite link events only.
     */
    public function getInviteLink(): ?ChatInviteLink
    {
        return $this->inviteLink;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self(
            Chat::fromArray($array['chat']),
            User::fromArray($array['from']),
            $array['date'],
            ChatMember::fromArray($array['old_chat_member']),
            ChatMember::fromArray($array['new_chat_member']),
        );

        $instance->inviteLink = ChatInviteLink::fromArray($array['invite_link'] ?? null);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'chat' => $this->chat,
            'from' => $this->from,
            'date' => $this->date,
            'old_chat_member' => $this->oldChatMember,
            'new_chat_member' => $this->newChatMember,
            'invite_link' => $this->inviteLink,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
