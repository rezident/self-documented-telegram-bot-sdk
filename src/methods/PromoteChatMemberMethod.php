<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the
 * chat for this to work and must have the appropriate administrator rights. Pass *False* for all boolean parameters to
 * demote a user. Returns *True* on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#promotechatmember
 */
class PromoteChatMemberMethod implements ToArrayInterface
{
    private ?bool $isAnonymous = null;

    private ?bool $canManageChat = null;

    private ?bool $canPostMessages = null;

    private ?bool $canEditMessages = null;

    private ?bool $canDeleteMessages = null;

    private ?bool $canManageVideoChats = null;

    private ?bool $canRestrictMembers = null;

    private ?bool $canPromoteMembers = null;

    private ?bool $canChangeInfo = null;

    private ?bool $canInviteUsers = null;

    private ?bool $canPinMessages = null;

    private ?bool $canManageTopics = null;

    private function __construct(private int|string $chatId, private int $userId)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     *                           `@channelusername`)
     * @param int $userId Unique identifier of the target user
     */
    public static function new(int|string $chatId, int $userId): self
    {
        return new self($chatId, $userId);
    }

    /**
     * Pass *True* if the administrator's presence in the chat is hidden
     */
    public function isAnonymous(?bool $isAnonymous): self
    {
        $this->isAnonymous = $isAnonymous;
        return $this;
    }

    /**
     * Pass *True* if the administrator can access the chat event log, chat statistics, message statistics in channels,
     * see channel members, see anonymous administrators in supergroups and ignore slow mode. Implied by any other
     * administrator privilege
     */
    public function canManageChat(?bool $canManageChat): self
    {
        $this->canManageChat = $canManageChat;
        return $this;
    }

    /**
     * Pass *True* if the administrator can create channel posts, channels only
     */
    public function canPostMessages(?bool $canPostMessages): self
    {
        $this->canPostMessages = $canPostMessages;
        return $this;
    }

    /**
     * Pass *True* if the administrator can edit messages of other users and can pin messages, channels only
     */
    public function canEditMessages(?bool $canEditMessages): self
    {
        $this->canEditMessages = $canEditMessages;
        return $this;
    }

    /**
     * Pass *True* if the administrator can delete messages of other users
     */
    public function canDeleteMessages(?bool $canDeleteMessages): self
    {
        $this->canDeleteMessages = $canDeleteMessages;
        return $this;
    }

    /**
     * Pass *True* if the administrator can manage video chats
     */
    public function canManageVideoChats(?bool $canManageVideoChats): self
    {
        $this->canManageVideoChats = $canManageVideoChats;
        return $this;
    }

    /**
     * Pass *True* if the administrator can restrict, ban or unban chat members
     */
    public function canRestrictMembers(?bool $canRestrictMembers): self
    {
        $this->canRestrictMembers = $canRestrictMembers;
        return $this;
    }

    /**
     * Pass *True* if the administrator can add new administrators with a subset of their own privileges or demote
     * administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed
     * by him)
     */
    public function canPromoteMembers(?bool $canPromoteMembers): self
    {
        $this->canPromoteMembers = $canPromoteMembers;
        return $this;
    }

    /**
     * Pass *True* if the administrator can change chat title, photo and other settings
     */
    public function canChangeInfo(?bool $canChangeInfo): self
    {
        $this->canChangeInfo = $canChangeInfo;
        return $this;
    }

    /**
     * Pass *True* if the administrator can invite new users to the chat
     */
    public function canInviteUsers(?bool $canInviteUsers): self
    {
        $this->canInviteUsers = $canInviteUsers;
        return $this;
    }

    /**
     * Pass *True* if the administrator can pin messages, supergroups only
     */
    public function canPinMessages(?bool $canPinMessages): self
    {
        $this->canPinMessages = $canPinMessages;
        return $this;
    }

    /**
     * Pass *True* if the user is allowed to create, rename, close, and reopen forum topics, supergroups only
     */
    public function canManageTopics(?bool $canManageTopics): self
    {
        $this->canManageTopics = $canManageTopics;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'user_id' => $this->userId,
            'is_anonymous' => $this->isAnonymous,
            'can_manage_chat' => $this->canManageChat,
            'can_post_messages' => $this->canPostMessages,
            'can_edit_messages' => $this->canEditMessages,
            'can_delete_messages' => $this->canDeleteMessages,
            'can_manage_video_chats' => $this->canManageVideoChats,
            'can_restrict_members' => $this->canRestrictMembers,
            'can_promote_members' => $this->canPromoteMembers,
            'can_change_info' => $this->canChangeInfo,
            'can_invite_users' => $this->canInviteUsers,
            'can_pin_messages' => $this->canPinMessages,
            'can_manage_topics' => $this->canManageTopics,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
