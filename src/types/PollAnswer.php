<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfInteger;

/**
 * This object represents an answer of a user in a non-anonymous poll.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#pollanswer
 */
class PollAnswer implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private string $pollId, private User $user, private ArrayOfInteger $optionIds)
    {
    }

    /**
     * @param string $pollId Unique poll identifier
     * @param User $user The user, who changed the answer to the poll
     * @param ArrayOfInteger $optionIds 0-based identifiers of answer options, chosen by the user. May be empty if the
     *                                  user retracted their vote.
     */
    public static function new(string $pollId, User $user, ArrayOfInteger $optionIds): self
    {
        return new self($pollId, $user, $optionIds);
    }

    /**
     * Unique poll identifier
     */
    public function getPollId(): ?string
    {
        return $this->pollId;
    }

    /**
     * The user, who changed the answer to the poll
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * 0-based identifiers of answer options, chosen by the user. May be empty if the user retracted their vote.
     */
    public function getOptionIds(): ?ArrayOfInteger
    {
        return $this->optionIds;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self(
            $array['poll_id'],
            User::fromArray($array['user']),
            ArrayOfInteger::fromArray($array['option_ids']),
        );

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'poll_id' => $this->pollId,
            'user' => $this->user,
            'option_ids' => $this->optionIds,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
