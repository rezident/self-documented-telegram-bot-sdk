<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that is under certain restrictions in the
 * chat. Supergroups only.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#chatmemberrestricted
 */
class ChatMemberRestricted extends ChatMember implements FromArrayInterface, ToArrayInterface
{
    private function __construct(
        private string $status,
        private User $user,
        private bool $isMember,
        private bool $canSendMessages,
        private bool $canSendAudios,
        private bool $canSendDocuments,
        private bool $canSendPhotos,
        private bool $canSendVideos,
        private bool $canSendVideoNotes,
        private bool $canSendVoiceNotes,
        private bool $canSendPolls,
        private bool $canSendOtherMessages,
        private bool $canAddWebPagePreviews,
        private bool $canChangeInfo,
        private bool $canInviteUsers,
        private bool $canPinMessages,
        private bool $canManageTopics,
        private int $untilDate
    ) {
    }

    /**
     * @param string $status The member's status in the chat, always “restricted”
     * @param User $user Information about the user
     * @param bool $isMember *True*, if the user is a member of the chat at the moment of the request
     * @param bool $canSendMessages *True*, if the user is allowed to send text messages, contacts, invoices, locations
     *                              and venues
     * @param bool $canSendAudios *True*, if the user is allowed to send audios
     * @param bool $canSendDocuments *True*, if the user is allowed to send documents
     * @param bool $canSendPhotos *True*, if the user is allowed to send photos
     * @param bool $canSendVideos *True*, if the user is allowed to send videos
     * @param bool $canSendVideoNotes *True*, if the user is allowed to send video notes
     * @param bool $canSendVoiceNotes *True*, if the user is allowed to send voice notes
     * @param bool $canSendPolls *True*, if the user is allowed to send polls
     * @param bool $canSendOtherMessages *True*, if the user is allowed to send animations, games, stickers and use
     *                                   inline bots
     * @param bool $canAddWebPagePreviews *True*, if the user is allowed to add web page previews to their messages
     * @param bool $canChangeInfo *True*, if the user is allowed to change the chat title, photo and other settings
     * @param bool $canInviteUsers *True*, if the user is allowed to invite new users to the chat
     * @param bool $canPinMessages *True*, if the user is allowed to pin messages
     * @param bool $canManageTopics *True*, if the user is allowed to create forum topics
     * @param int $untilDate Date when restrictions will be lifted for this user; unix time. If 0, then the user is
     *                       restricted forever
     */
    public static function new(
        string $status,
        User $user,
        bool $isMember,
        bool $canSendMessages,
        bool $canSendAudios,
        bool $canSendDocuments,
        bool $canSendPhotos,
        bool $canSendVideos,
        bool $canSendVideoNotes,
        bool $canSendVoiceNotes,
        bool $canSendPolls,
        bool $canSendOtherMessages,
        bool $canAddWebPagePreviews,
        bool $canChangeInfo,
        bool $canInviteUsers,
        bool $canPinMessages,
        bool $canManageTopics,
        int $untilDate,
    ): self {
        return new self(
            $status,
            $user,
            $isMember,
            $canSendMessages,
            $canSendAudios,
            $canSendDocuments,
            $canSendPhotos,
            $canSendVideos,
            $canSendVideoNotes,
            $canSendVoiceNotes,
            $canSendPolls,
            $canSendOtherMessages,
            $canAddWebPagePreviews,
            $canChangeInfo,
            $canInviteUsers,
            $canPinMessages,
            $canManageTopics,
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
     * *True*, if the user is allowed to send text messages, contacts, invoices, locations and venues
     */
    public function getCanSendMessages(): ?bool
    {
        return $this->canSendMessages;
    }

    /**
     * *True*, if the user is allowed to send audios
     */
    public function getCanSendAudios(): ?bool
    {
        return $this->canSendAudios;
    }

    /**
     * *True*, if the user is allowed to send documents
     */
    public function getCanSendDocuments(): ?bool
    {
        return $this->canSendDocuments;
    }

    /**
     * *True*, if the user is allowed to send photos
     */
    public function getCanSendPhotos(): ?bool
    {
        return $this->canSendPhotos;
    }

    /**
     * *True*, if the user is allowed to send videos
     */
    public function getCanSendVideos(): ?bool
    {
        return $this->canSendVideos;
    }

    /**
     * *True*, if the user is allowed to send video notes
     */
    public function getCanSendVideoNotes(): ?bool
    {
        return $this->canSendVideoNotes;
    }

    /**
     * *True*, if the user is allowed to send voice notes
     */
    public function getCanSendVoiceNotes(): ?bool
    {
        return $this->canSendVoiceNotes;
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
            $array['can_send_messages'],
            $array['can_send_audios'],
            $array['can_send_documents'],
            $array['can_send_photos'],
            $array['can_send_videos'],
            $array['can_send_video_notes'],
            $array['can_send_voice_notes'],
            $array['can_send_polls'],
            $array['can_send_other_messages'],
            $array['can_add_web_page_previews'],
            $array['can_change_info'],
            $array['can_invite_users'],
            $array['can_pin_messages'],
            $array['can_manage_topics'],
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
            'can_send_messages' => $this->canSendMessages,
            'can_send_audios' => $this->canSendAudios,
            'can_send_documents' => $this->canSendDocuments,
            'can_send_photos' => $this->canSendPhotos,
            'can_send_videos' => $this->canSendVideos,
            'can_send_video_notes' => $this->canSendVideoNotes,
            'can_send_voice_notes' => $this->canSendVoiceNotes,
            'can_send_polls' => $this->canSendPolls,
            'can_send_other_messages' => $this->canSendOtherMessages,
            'can_add_web_page_previews' => $this->canAddWebPagePreviews,
            'can_change_info' => $this->canChangeInfo,
            'can_invite_users' => $this->canInviteUsers,
            'can_pin_messages' => $this->canPinMessages,
            'can_manage_topics' => $this->canManageTopics,
            'until_date' => $this->untilDate,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
