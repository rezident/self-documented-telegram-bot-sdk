<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that owns the chat and has all
 * administrator privileges.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#chatmemberowner
 */
class ChatMemberOwner extends ChatMember implements FromArrayInterface, ToArrayInterface
{
    private ?string $customTitle = null;

    private function __construct(private string $status, private User $user, private bool $isAnonymous)
    {
    }

    /**
     * @param string $status The member's status in the chat, always “creator”
     * @param User $user Information about the user
     * @param bool $isAnonymous *True*, if the user's presence in the chat is hidden
     */
    public static function new(string $status, User $user, bool $isAnonymous): self
    {
        return new self($status, $user, $isAnonymous);
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
     * The member's status in the chat, always “creator”
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
     * *True*, if the user's presence in the chat is hidden
     */
    public function getIsAnonymous(): ?bool
    {
        return $this->isAnonymous;
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

        $instance = new self($array['status'], User::fromArray($array['user']), $array['is_anonymous']);

        $instance->customTitle = $array['custom_title'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'status' => $this->status,
            'user' => $this->user,
            'is_anonymous' => $this->isAnonymous,
            'custom_title' => $this->customTitle,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
