<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object contains information about one answer option in a poll.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#polloption
 */
class PollOption implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private string $text, private int $voterCount)
    {
    }

    /**
     * @param string $text Option text, 1-100 characters
     * @param int $voterCount Number of users that voted for this option
     */
    public static function new(string $text, int $voterCount): self
    {
        return new self($text, $voterCount);
    }

    /**
     * Option text, 1-100 characters
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Number of users that voted for this option
     */
    public function getVoterCount(): ?int
    {
        return $this->voterCount;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['text'], $array['voter_count']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'text' => $this->text,
            'voter_count' => $this->voterCount,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
