<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Describes actions that a non-administrator user is allowed to take in a chat.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#chatpermissions
 */
class ChatPermissions implements FromArrayInterface, ToArrayInterface
{
    private ?bool $canSendMessages = null;

    private ?bool $canSendMediaMessages = null;

    private ?bool $canSendPolls = null;

    private ?bool $canSendOtherMessages = null;

    private ?bool $canAddWebPagePreviews = null;

    private ?bool $canChangeInfo = null;

    private ?bool $canInviteUsers = null;

    private ?bool $canPinMessages = null;

    /**
     * *True*, if the user is allowed to send text messages, contacts, locations and venues
     */
    public function canSendMessages(?bool $canSendMessages): self
    {
        $this->canSendMessages = $canSendMessages;
        return $this;
    }

    /**
     * *True*, if the user is allowed to send audios, documents, photos, videos, video notes and voice notes, implies
     * can\_send\_messages
     */
    public function canSendMediaMessages(?bool $canSendMediaMessages): self
    {
        $this->canSendMediaMessages = $canSendMediaMessages;
        return $this;
    }

    /**
     * *True*, if the user is allowed to send polls, implies can\_send\_messages
     */
    public function canSendPolls(?bool $canSendPolls): self
    {
        $this->canSendPolls = $canSendPolls;
        return $this;
    }

    /**
     * *True*, if the user is allowed to send animations, games, stickers and use inline bots, implies
     * can\_send\_media\_messages
     */
    public function canSendOtherMessages(?bool $canSendOtherMessages): self
    {
        $this->canSendOtherMessages = $canSendOtherMessages;
        return $this;
    }

    /**
     * *True*, if the user is allowed to add web page previews to their messages, implies can\_send\_media\_messages
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
     * *True*, if the user is allowed to send text messages, contacts, locations and venues
     */
    public function getCanSendMessages(): ?bool
    {
        return $this->canSendMessages;
    }

    /**
     * *True*, if the user is allowed to send audios, documents, photos, videos, video notes and voice notes, implies
     * can\_send\_messages
     */
    public function getCanSendMediaMessages(): ?bool
    {
        return $this->canSendMediaMessages;
    }

    /**
     * *True*, if the user is allowed to send polls, implies can\_send\_messages
     */
    public function getCanSendPolls(): ?bool
    {
        return $this->canSendPolls;
    }

    /**
     * *True*, if the user is allowed to send animations, games, stickers and use inline bots, implies
     * can\_send\_media\_messages
     */
    public function getCanSendOtherMessages(): ?bool
    {
        return $this->canSendOtherMessages;
    }

    /**
     * *True*, if the user is allowed to add web page previews to their messages, implies can\_send\_media\_messages
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

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self();

        $instance->canSendMessages = $array['can_send_messages'] ?? null;
        $instance->canSendMediaMessages = $array['can_send_media_messages'] ?? null;
        $instance->canSendPolls = $array['can_send_polls'] ?? null;
        $instance->canSendOtherMessages = $array['can_send_other_messages'] ?? null;
        $instance->canAddWebPagePreviews = $array['can_add_web_page_previews'] ?? null;
        $instance->canChangeInfo = $array['can_change_info'] ?? null;
        $instance->canInviteUsers = $array['can_invite_users'] ?? null;
        $instance->canPinMessages = $array['can_pin_messages'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'can_send_messages' => $this->canSendMessages,
            'can_send_media_messages' => $this->canSendMediaMessages,
            'can_send_polls' => $this->canSendPolls,
            'can_send_other_messages' => $this->canSendOtherMessages,
            'can_add_web_page_previews' => $this->canAddWebPagePreviews,
            'can_change_info' => $this->canChangeInfo,
            'can_invite_users' => $this->canInviteUsers,
            'can_pin_messages' => $this->canPinMessages,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
