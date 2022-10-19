<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents a join request sent to a chat.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#chatjoinrequest
 */
class ChatJoinRequest implements FromArrayInterface, ToArrayInterface
{
    private ?string $bio = null;

    private ?ChatInviteLink $inviteLink = null;

    private function __construct(private Chat $chat, private User $from, private int $date)
    {
    }

    /**
     * @param Chat $chat Chat to which the request was sent
     * @param User $from User that sent the join request
     * @param int $date Date the request was sent in Unix time
     */
    public static function new(Chat $chat, User $from, int $date): self
    {
        return new self($chat, $from, $date);
    }

    /**
     * Bio of the user.
     */
    public function bio(?string $bio): self
    {
        $this->bio = $bio;
        return $this;
    }

    /**
     * Chat invite link that was used by the user to send the join request
     */
    public function inviteLink(?ChatInviteLink $inviteLink): self
    {
        $this->inviteLink = $inviteLink;
        return $this;
    }

    /**
     * Chat to which the request was sent
     */
    public function getChat(): ?Chat
    {
        return $this->chat;
    }

    /**
     * User that sent the join request
     */
    public function getFrom(): ?User
    {
        return $this->from;
    }

    /**
     * Date the request was sent in Unix time
     */
    public function getDate(): ?int
    {
        return $this->date;
    }

    /**
     * Bio of the user.
     */
    public function getBio(): ?string
    {
        return $this->bio;
    }

    /**
     * Chat invite link that was used by the user to send the join request
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

        $instance = new self(Chat::fromArray($array['chat']), User::fromArray($array['from']), $array['date']);

        $instance->bio = $array['bio'] ?? null;
        $instance->inviteLink = ChatInviteLink::fromArray($array['invite_link'] ?? null);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'chat' => $this->chat,
            'from' => $this->from,
            'date' => $this->date,
            'bio' => $this->bio,
            'invite_link' => $this->inviteLink,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
