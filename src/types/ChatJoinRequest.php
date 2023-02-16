<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents a join request sent to a chat.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#chatjoinrequest
 */
class ChatJoinRequest implements FromArrayInterface, ToArrayInterface
{
    private ?string $bio = null;

    private ?ChatInviteLink $inviteLink = null;

    private function __construct(private Chat $chat, private User $from, private int $userChatId, private int $date)
    {
    }

    /**
     * @param Chat $chat Chat to which the request was sent
     * @param User $from User that sent the join request
     * @param int $userChatId Identifier of a private chat with the user who sent the join request. This number may
     *                        have more than 32 significant bits and some programming languages may have
     *                        difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so
     *                        a 64-bit integer or double-precision float type are safe for storing this identifier. The
     *                        bot can use this identifier for 24 hours to send messages until the join request is
     *                        processed, assuming no other administrator contacted the user.
     * @param int $date Date the request was sent in Unix time
     */
    public static function new(Chat $chat, User $from, int $userChatId, int $date): self
    {
        return new self($chat, $from, $userChatId, $date);
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
     * Identifier of a private chat with the user who sent the join request. This number may have more than 32
     * significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it
     * has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this
     * identifier. The bot can use this identifier for 24 hours to send messages until the join request is processed,
     * assuming no other administrator contacted the user.
     */
    public function getUserChatId(): ?int
    {
        return $this->userChatId;
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

        $instance = new self(
            Chat::fromArray($array['chat']),
            User::fromArray($array['from']),
            $array['user_chat_id'],
            $array['date'],
        );

        $instance->bio = $array['bio'] ?? null;
        $instance->inviteLink = ChatInviteLink::fromArray($array['invite_link'] ?? null);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'chat' => $this->chat,
            'from' => $this->from,
            'user_chat_id' => $this->userChatId,
            'date' => $this->date,
            'bio' => $this->bio,
            'invite_link' => $this->inviteLink,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
