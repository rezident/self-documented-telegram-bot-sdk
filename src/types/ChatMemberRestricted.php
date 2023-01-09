<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that is under certain restrictions in the
 * chat. Supergroups only.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#chatmemberrestricted
 */
class ChatMemberRestricted extends ChatMember implements FromArrayInterface, ToArrayInterface
{
    private function __construct(
        private string $status,
        private User $user,
        private bool $isMember,
        private bool $canChangeInfo,
        private bool $canInviteUsers,
        private bool $canPinMessages,
        private bool $canManageTopics,
        private bool $canSendMessages,
        private bool $canSendMediaMessages,
        private bool $canSendPolls,
        private bool $canSendOtherMessages,
        private bool $canAddWebPagePreviews,
        private int $untilDate
    ) {
    }

    /**
     * @param string $status The member's status in the chat, always “restricted”
     * @param User $user Information about the user
     * @param bool $isMember *True*, if the user is a member of the chat at the moment of the request
     * @param bool $canChangeInfo *True*, if the user is allowed to change the chat title, photo and other settings
     * @param bool $canInviteUsers *True*, if the user is allowed to invite new users to the chat
     * @param bool $canPinMessages *True*, if the user is allowed to pin messages
     * @param bool $canManageTopics *True*, if the user is allowed to create forum topics
     * @param bool $canSendMessages *True*, if the user is allowed to send text messages, contacts, locations and
     *                              venues
     * @param bool $canSendMediaMessages *True*, if the user is allowed to send audios, documents, photos, videos,
     *                                   video notes and voice notes
     * @param bool $canSendPolls *True*, if the user is allowed to send polls
     * @param bool $canSendOtherMessages *True*, if the user is allowed to send animations, games, stickers and use
     *                                   inline bots
     * @param bool $canAddWebPagePreviews *True*, if the user is allowed to add web page previews to their messages
     * @param int $untilDate Date when restrictions will be lifted for this user; unix time. If 0, then the user is
     *                       restricted forever
     */
    public static function new(
        string $status,
        User $user,
        bool $isMember,
        bool $canChangeInfo,
        bool $canInviteUsers,
        bool $canPinMessages,
        bool $canManageTopics,
        bool $canSendMessages,
        bool $canSendMediaMessages,
        bool $canSendPolls,
        bool $canSendOtherMessages,
        bool $canAddWebPagePreviews,
        int $untilDate,
    ): self {
        return new self(
            $status,
            $user,
            $isMember,
            $canChangeInfo,
            $canInviteUsers,
            $canPinMessages,
            $canManageTopics,
            $canSendMessages,
            $canSendMediaMessages,
            $canSendPolls,
            $canSendOtherMessages,
            $canAddWebPagePreviews,
            $untilDate,
        );
    }

    /**
     * The member's status in the chat, always “restricted”
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
     * *True*, if the user is a member of the chat at the moment of the request
     */
    public function getIsMember(): ?bool
    {
        return $this->isMember;
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
     * *True*, if the user is allowed to pin messages
     */
    public function getCanPinMessages(): ?bool
    {
        return $this->canPinMessages;
    }

    /**
     * *True*, if the user is allowed to create forum topics
     */
    public function getCanManageTopics(): ?bool
    {
        return $this->canManageTopics;
    }

    /**
     * *True*, if the user is allowed to send text messages, contacts, locations and venues
     */
    public function getCanSendMessages(): ?bool
    {
        return $this->canSendMessages;
    }

    /**
     * *True*, if the user is allowed to send audios, documents, photos, videos, video notes and voice notes
     */
    public function getCanSendMediaMessages(): ?bool
    {
        return $this->canSendMediaMessages;
    }

    /**
     * *True*, if the user is allowed to send polls
     */
    public function getCanSendPolls(): ?bool
    {
        return $this->canSendPolls;
    }

    /**
     * *True*, if the user is allowed to send animations, games, stickers and use inline bots
     */
    public function getCanSendOtherMessages(): ?bool
    {
        return $this->canSendOtherMessages;
    }

    /**
     * *True*, if the user is allowed to add web page previews to their messages
     */
    public function getCanAddWebPagePreviews(): ?bool
    {
        return $this->canAddWebPagePreviews;
    }

    /**
     * Date when restrictions will be lifted for this user; unix time. If 0, then the user is restricted forever
     */
    public function getUntilDate(): ?int
    {
        return $this->untilDate;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self(
            $array['status'],
            User::fromArray($array['user']),
            $array['is_member'],
            $array['can_change_info'],
            $array['can_invite_users'],
            $array['can_pin_messages'],
            $array['can_manage_topics'],
            $array['can_send_messages'],
            $array['can_send_media_messages'],
            $array['can_send_polls'],
            $array['can_send_other_messages'],
            $array['can_add_web_page_previews'],
            $array['until_date'],
        );

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'status' => $this->status,
            'user' => $this->user,
            'is_member' => $this->isMember,
            'can_change_info' => $this->canChangeInfo,
            'can_invite_users' => $this->canInviteUsers,
            'can_pin_messages' => $this->canPinMessages,
            'can_manage_topics' => $this->canManageTopics,
            'can_send_messages' => $this->canSendMessages,
            'can_send_media_messages' => $this->canSendMediaMessages,
            'can_send_polls' => $this->canSendPolls,
            'can_send_other_messages' => $this->canSendOtherMessages,
            'can_add_web_page_previews' => $this->canAddWebPagePreviews,
            'until_date' => $this->untilDate,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
