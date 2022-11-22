<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that was banned in the chat and can't
 * return to the chat or view chat messages.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#chatmemberbanned
 */
class ChatMemberBanned extends ChatMember implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private string $status, private User $user, private int $untilDate)
    {
    }

    /**
     * @param string $status The member's status in the chat, always “kicked”
     * @param User $user Information about the user
     * @param int $untilDate Date when restrictions will be lifted for this user; unix time. If 0, then the user is
     *                       banned forever
     */
    public static function new(string $status, User $user, int $untilDate): self
    {
        return new self($status, $user, $untilDate);
    }

    /**
     * The member's status in the chat, always “kicked”
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
     * Date when restrictions will be lifted for this user; unix time. If 0, then the user is banned forever
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

        $instance = new self($array['status'], User::fromArray($array['user']), $array['until_date']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'status' => $this->status,
            'user' => $this->user,
            'until_date' => $this->untilDate,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
