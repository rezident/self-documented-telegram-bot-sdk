<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Describes actions that a non-administrator user is allowed to take in a chat.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#chatpermissions
 */
class ChatPermissions implements FromArrayInterface, ToArrayInterface
{
    private ?bool $canSendMessages = null;

    private ?bool $canSendAudios = null;

    private ?bool $canSendDocuments = null;

    private ?bool $canSendPhotos = null;

    private ?bool $canSendVideos = null;

    private ?bool $canSendVideoNotes = null;

    private ?bool $canSendVoiceNotes = null;

    private ?bool $canSendPolls = null;

    private ?bool $canSendOtherMessages = null;

    private ?bool $canAddWebPagePreviews = null;

    private ?bool $canChangeInfo = null;

    private ?bool $canInviteUsers = null;

    private ?bool $canPinMessages = null;

    private ?bool $canManageTopics = null;

    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    /**
     * *True*, if the user is allowed to send text messages, contacts, invoices, locations and venues
     */
    public function canSendMessages(?bool $canSendMessages): self
    {
        $this->canSendMessages = $canSendMessages;
        return $this;
    }

    /**
     * *True*, if the user is allowed to send audios
     */
    public function canSendAudios(?bool $canSendAudios): self
    {
        $this->canSendAudios = $canSendAudios;
        return $this;
    }

    /**
     * *True*, if the user is allowed to send documents
     */
    public function canSendDocuments(?bool $canSendDocuments): self
    {
        $this->canSendDocuments = $canSendDocuments;
        return $this;
    }

    /**
     * *True*, if the user is allowed to send photos
     */
    public function canSendPhotos(?bool $canSendPhotos): self
    {
        $this->canSendPhotos = $canSendPhotos;
        return $this;
    }

    /**
     * *True*, if the user is allowed to send videos
     */
    public function canSendVideos(?bool $canSendVideos): self
    {
        $this->canSendVideos = $canSendVideos;
        return $this;
    }

    /**
     * *True*, if the user is allowed to send video notes
     */
    public function canSendVideoNotes(?bool $canSendVideoNotes): self
    {
        $this->canSendVideoNotes = $canSendVideoNotes;
        return $this;
    }

    /**
     * *True*, if the user is allowed to send voice notes
     */
    public function canSendVoiceNotes(?bool $canSendVoiceNotes): self
    {
        $this->canSendVoiceNotes = $canSendVoiceNotes;
        return $this;
    }

    /**
     * *True*, if the user is allowed to send polls
     */
    public function canSendPolls(?bool $canSendPolls): self
    {
        $this->canSendPolls = $canSendPolls;
        return $this;
    }

    /**
     * *True*, if the user is allowed to send animations, games, stickers and use inline bots
     */
    public function canSendOtherMessages(?bool $canSendOtherMessages): self
    {
        $this->canSendOtherMessages = $canSendOtherMessages;
        return $this;
    }

    /**
     * *True*, if the user is allowed to add web page previews to their messages
     */
    public function canAddWebPagePreviews(?bool $canAddWebPagePreviews): self
    {
        $this->canAddWebPagePreviews = $canAddWebPagePreviews;
        return $this;
    }

    /**
     * *True*, if the user is allowed to change the chat title, photo and other settings. Ignored in public supergroups
     */
    public function canChangeInfo(?bool $canChangeInfo): self
    {
        $this->canChangeInfo = $canChangeInfo;
        return $this;
    }

    /**
     * *True*, if the user is allowed to invite new users to the chat
     */
    public function canInviteUsers(?bool $canInviteUsers): self
    {
        $this->canInviteUsers = $canInviteUsers;
        return $this;
    }

    /**
     * *True*, if the user is allowed to pin messages. Ignored in public supergroups
     */
    public function canPinMessages(?bool $canPinMessages): self
    {
        $this->canPinMessages = $canPinMessages;
        return $this;
    }

    /**
     * *True*, if the user is allowed to create forum topics. If omitted defaults to the value of can\_pin\_messages
     */
    public function canManageTopics(?bool $canManageTopics): self
    {
        $this->canManageTopics = $canManageTopics;
        return $this;
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
     * *True*, if the user is allowed to change the chat title, photo and other settings. Ignored in public supergroups
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
     * *True*, if the user is allowed to pin messages. Ignored in public supergroups
     */
    public function getCanPinMessages(): ?bool
    {
        return $this->canPinMessages;
    }

    /**
     * *True*, if the user is allowed to create forum topics. If omitted defaults to the value of can\_pin\_messages
     */
    public function getCanManageTopics(): ?bool
    {
        return $this->canManageTopics;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self();

        $instance->canSendMessages = $array['can_send_messages'] ?? null;
        $instance->canSendAudios = $array['can_send_audios'] ?? null;
        $instance->canSendDocuments = $array['can_send_documents'] ?? null;
        $instance->canSendPhotos = $array['can_send_photos'] ?? null;
        $instance->canSendVideos = $array['can_send_videos'] ?? null;
        $instance->canSendVideoNotes = $array['can_send_video_notes'] ?? null;
        $instance->canSendVoiceNotes = $array['can_send_voice_notes'] ?? null;
        $instance->canSendPolls = $array['can_send_polls'] ?? null;
        $instance->canSendOtherMessages = $array['can_send_other_messages'] ?? null;
        $instance->canAddWebPagePreviews = $array['can_add_web_page_previews'] ?? null;
        $instance->canChangeInfo = $array['can_change_info'] ?? null;
        $instance->canInviteUsers = $array['can_invite_users'] ?? null;
        $instance->canPinMessages = $array['can_pin_messages'] ?? null;
        $instance->canManageTopics = $array['can_manage_topics'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
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
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
