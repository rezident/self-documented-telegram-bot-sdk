<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that has some additional privileges.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#chatmemberadministrator
 */
class ChatMemberAdministrator extends ChatMember implements FromArrayInterface, ToArrayInterface
{
    private ?bool $canPostMessages = null;

    private ?bool $canEditMessages = null;

    private ?bool $canPinMessages = null;

    private ?bool $canManageTopics = null;

    private ?string $customTitle = null;

    private function __construct(
        private string $status,
        private User $user,
        private bool $canBeEdited,
        private bool $isAnonymous,
        private bool $canManageChat,
        private bool $canDeleteMessages,
        private bool $canManageVideoChats,
        private bool $canRestrictMembers,
        private bool $canPromoteMembers,
        private bool $canChangeInfo,
        private bool $canInviteUsers
    ) {
    }

    /**
     * @param string $status The member's status in the chat, always “administrator”
     * @param User $user Information about the user
     * @param bool $canBeEdited *True*, if the bot is allowed to edit administrator privileges of that user
     * @param bool $isAnonymous *True*, if the user's presence in the chat is hidden
     * @param bool $canManageChat *True*, if the administrator can access the chat event log, chat statistics, message
     *                            statistics in channels, see channel members, see anonymous administrators in
     *                            supergroups and ignore slow mode. Implied by any other administrator privilege
     * @param bool $canDeleteMessages *True*, if the administrator can delete messages of other users
     * @param bool $canManageVideoChats *True*, if the administrator can manage video chats
     * @param bool $canRestrictMembers *True*, if the administrator can restrict, ban or unban chat members
     * @param bool $canPromoteMembers *True*, if the administrator can add new administrators with a subset of their
     *                                own privileges or demote administrators that he has promoted, directly or
     *                                indirectly (promoted by administrators that were appointed by the user)
     * @param bool $canChangeInfo *True*, if the user is allowed to change the chat title, photo and other settings
     * @param bool $canInviteUsers *True*, if the user is allowed to invite new users to the chat
     */
    public static function new(
        string $status,
        User $user,
        bool $canBeEdited,
        bool $isAnonymous,
        bool $canManageChat,
        bool $canDeleteMessages,
        bool $canManageVideoChats,
        bool $canRestrictMembers,
        bool $canPromoteMembers,
        bool $canChangeInfo,
        bool $canInviteUsers,
    ): self {
        return new self(
            $status,
            $user,
            $canBeEdited,
            $isAnonymous,
            $canManageChat,
            $canDeleteMessages,
            $canManageVideoChats,
            $canRestrictMembers,
            $canPromoteMembers,
            $canChangeInfo,
            $canInviteUsers,
        );
    }

    /**
     * *True*, if the administrator can post in the channel; channels only
     */
    public function canPostMessages(?bool $canPostMessages): self
    {
        $this->canPostMessages = $canPostMessages;
        return $this;
    }

    /**
     * *True*, if the administrator can edit messages of other users and can pin messages; channels only
     */
    public function canEditMessages(?bool $canEditMessages): self
    {
        $this->canEditMessages = $canEditMessages;
        return $this;
    }

    /**
     * *True*, if the user is allowed to pin messages; groups and supergroups only
     */
    public function canPinMessages(?bool $canPinMessages): self
    {
        $this->canPinMessages = $canPinMessages;
        return $this;
    }

    /**
     * *True*, if the user is allowed to create, rename, close, and reopen forum topics; supergroups only
     */
    public function canManageTopics(?bool $canManageTopics): self
    {
        $this->canManageTopics = $canManageTopics;
        return $this;
    }

    /**
     * Custom title for this user
     */
    public function customTitle(?string $customTitle): self
    {
        $this->customTitle = $customTitle;
        return $this;
    }

    /**
     * The member's status in the chat, always “administrator”
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Information about the user
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * *True*, if the bot is allowed to edit administrator privileges of that user
     */
    public function getCanBeEdited(): ?bool
    {
        return $this->canBeEdited;
    }

    /**
     * *True*, if the user's presence in the chat is hidden
     */
    public function getIsAnonymous(): ?bool
    {
        return $this->isAnonymous;
    }

    /**
     * *True*, if the administrator can access the chat event log, chat statistics, message statistics in channels, see
     * channel members, see anonymous administrators in supergroups and ignore slow mode. Implied by any other
     * administrator privilege
     */
    public function getCanManageChat(): ?bool
    {
        return $this->canManageChat;
    }

    /**
     * *True*, if the administrator can delete messages of other users
     */
    public function getCanDeleteMessages(): ?bool
    {
        return $this->canDeleteMessages;
    }

    /**
     * *True*, if the administrator can manage video chats
     */
    public function getCanManageVideoChats(): ?bool
    {
        return $this->canManageVideoChats;
    }

    /**
     * *True*, if the administrator can restrict, ban or unban chat members
     */
    public function getCanRestrictMembers(): ?bool
    {
        return $this->canRestrictMembers;
    }

    /**
     * *True*, if the administrator can add new administrators with a subset of their own privileges or demote
     * administrators that he has promoted, directly or indirectly (promoted by administrators that were appointed by
     * the user)
     */
    public function getCanPromoteMembers(): ?bool
    {
        return $this->canPromoteMembers;
    }

    /**
     * *True*, if the user is allowed to change the chat title, photo and other settings
     */
    public function getCanChangeInfo(): ?bool
    {
        return $this->canChangeInfo;
    }

    /**
     * *True*, if the user is allowed to invite new users to the chat
     */
    public function getCanInviteUsers(): ?bool
    {
        return $this->canInviteUsers;
    }

    /**
     * *True*, if the administrator can post in the channel; channels only
     */
    public function getCanPostMessages(): ?bool
    {
        return $this->canPostMessages;
    }

    /**
     * *True*, if the administrator can edit messages of other users and can pin messages; channels only
     */
    public function getCanEditMessages(): ?bool
    {
        return $this->canEditMessages;
    }

    /**
     * *True*, if the user is allowed to pin messages; groups and supergroups only
     */
    public function getCanPinMessages(): ?bool
    {
        return $this->canPinMessages;
    }

    /**
     * *True*, if the user is allowed to create, rename, close, and reopen forum topics; supergroups only
     */
    public function getCanManageTopics(): ?bool
    {
        return $this->canManageTopics;
    }

    /**
     * Custom title for this user
     */
    public function getCustomTitle(): ?string
    {
        return $this->customTitle;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self(
            $array['status'],
            User::fromArray($array['user']),
            $array['can_be_edited'],
            $array['is_anonymous'],
            $array['can_manage_chat'],
            $array['can_delete_messages'],
            $array['can_manage_video_chats'],
            $array['can_restrict_members'],
            $array['can_promote_members'],
            $array['can_change_info'],
            $array['can_invite_users'],
        );

        $instance->canPostMessages = $array['can_post_messages'] ?? null;
        $instance->canEditMessages = $array['can_edit_messages'] ?? null;
        $instance->canPinMessages = $array['can_pin_messages'] ?? null;
        $instance->canManageTopics = $array['can_manage_topics'] ?? null;
        $instance->customTitle = $array['custom_title'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'status' => $this->status,
            'user' => $this->user,
            'can_be_edited' => $this->canBeEdited,
            'is_anonymous' => $this->isAnonymous,
            'can_manage_chat' => $this->canManageChat,
            'can_delete_messages' => $this->canDeleteMessages,
            'can_manage_video_chats' => $this->canManageVideoChats,
            'can_restrict_members' => $this->canRestrictMembers,
            'can_promote_members' => $this->canPromoteMembers,
            'can_change_info' => $this->canChangeInfo,
            'can_invite_users' => $this->canInviteUsers,
            'can_post_messages' => $this->canPostMessages,
            'can_edit_messages' => $this->canEditMessages,
            'can_pin_messages' => $this->canPinMessages,
            'can_manage_topics' => $this->canManageTopics,
            'custom_title' => $this->customTitle,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
