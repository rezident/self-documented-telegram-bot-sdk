<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that has no additional privileges or
 * restrictions.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#chatmembermember
 */
class ChatMemberMember extends ChatMember implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private string $status, private User $user)
    {
    }

    /**
     * @param string $status The member's status in the chat, always “member”
     * @param User $user Information about the user
     */
    public static function new(string $status, User $user): self
    {
        return new self($status, $user);
    }

    /**
     * The member's status in the chat, always “member”
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

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['status'], User::fromArray($array['user']));

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'status' => $this->status,
            'user' => $this->user,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
