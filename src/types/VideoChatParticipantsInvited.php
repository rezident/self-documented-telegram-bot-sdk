<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfUser;

/**
 * This object represents a service message about new members invited to a video chat.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#videochatparticipantsinvited
 */
class VideoChatParticipantsInvited implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private ArrayOfUser $users)
    {
    }

    /**
     * @param ArrayOfUser $users New members that were invited to the video chat
     */
    public static function new(ArrayOfUser $users): self
    {
        return new self($users);
    }

    /**
     * New members that were invited to the video chat
     */
    public function getUsers(): ?ArrayOfUser
    {
        return $this->users;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self(ArrayOfUser::fromArray($array['users']));

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'users' => $this->users,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
