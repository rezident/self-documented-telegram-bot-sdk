<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents an invite link for a chat.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#chatinvitelink
 */
class ChatInviteLink implements FromArrayInterface, ToArrayInterface
{
    private ?string $name = null;

    private ?int $expireDate = null;

    private ?int $memberLimit = null;

    private ?int $pendingJoinRequestCount = null;

    private function __construct(
        private string $inviteLink,
        private User $creator,
        private bool $createsJoinRequest,
        private bool $isPrimary,
        private bool $isRevoked
    ) {
    }

    /**
     * @param string $inviteLink The invite link. If the link was created by another chat administrator, then the
     *                           second part of the link will be replaced with “…”.
     * @param User $creator Creator of the link
     * @param bool $createsJoinRequest *True*, if users joining the chat via the link need to be approved by chat
     *                                 administrators
     * @param bool $isPrimary *True*, if the link is primary
     * @param bool $isRevoked *True*, if the link is revoked
     */
    public static function new(
        string $inviteLink,
        User $creator,
        bool $createsJoinRequest,
        bool $isPrimary,
        bool $isRevoked,
    ): self {
        return new self($inviteLink, $creator, $createsJoinRequest, $isPrimary, $isRevoked);
    }

    /**
     * Invite link name
     */
    public function name(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Point in time (Unix timestamp) when the link will expire or has been expired
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
     * Number of pending join requests created using this link
     */
    public function pendingJoinRequestCount(?int $pendingJoinRequestCount): self
    {
        $this->pendingJoinRequestCount = $pendingJoinRequestCount;
        return $this;
    }

    /**
     * The invite link. If the link was created by another chat administrator, then the second part of the link will be
     * replaced with “…”.
     */
    public function getInviteLink(): ?string
    {
        return $this->inviteLink;
    }

    /**
     * Creator of the link
     */
    public function getCreator(): ?User
    {
        return $this->creator;
    }

    /**
     * *True*, if users joining the chat via the link need to be approved by chat administrators
     */
    public function getCreatesJoinRequest(): ?bool
    {
        return $this->createsJoinRequest;
    }

    /**
     * *True*, if the link is primary
     */
    public function getIsPrimary(): ?bool
    {
        return $this->isPrimary;
    }

    /**
     * *True*, if the link is revoked
     */
    public function getIsRevoked(): ?bool
    {
        return $this->isRevoked;
    }

    /**
     * Invite link name
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Point in time (Unix timestamp) when the link will expire or has been expired
     */
    public function getExpireDate(): ?int
    {
        return $this->expireDate;
    }

    /**
     * The maximum number of users that can be members of the chat simultaneously after joining the chat via this
     * invite link; 1-99999
     */
    public function getMemberLimit(): ?int
    {
        return $this->memberLimit;
    }

    /**
     * Number of pending join requests created using this link
     */
    public function getPendingJoinRequestCount(): ?int
    {
        return $this->pendingJoinRequestCount;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self(
            $array['invite_link'],
            User::fromArray($array['creator']),
            $array['creates_join_request'],
            $array['is_primary'],
            $array['is_revoked'],
        );

        $instance->name = $array['name'] ?? null;
        $instance->expireDate = $array['expire_date'] ?? null;
        $instance->memberLimit = $array['member_limit'] ?? null;
        $instance->pendingJoinRequestCount = $array['pending_join_request_count'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'invite_link' => $this->inviteLink,
            'creator' => $this->creator,
            'creates_join_request' => $this->createsJoinRequest,
            'is_primary' => $this->isPrimary,
            'is_revoked' => $this->isRevoked,
            'name' => $this->name,
            'expire_date' => $this->expireDate,
            'member_limit' => $this->memberLimit,
            'pending_join_request_count' => $this->pendingJoinRequestCount,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
