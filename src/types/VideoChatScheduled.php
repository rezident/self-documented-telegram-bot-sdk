<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a service message about a video chat scheduled in the chat.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#videochatscheduled
 */
class VideoChatScheduled implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private int $startDate)
    {
    }

    /**
     * @param int $startDate Point in time (Unix timestamp) when the video chat is supposed to be started by a chat
     *                       administrator
     */
    public static function new(int $startDate): self
    {
        return new self($startDate);
    }

    /**
     * Point in time (Unix timestamp) when the video chat is supposed to be started by a chat administrator
     */
    public function getStartDate(): ?int
    {
        return $this->startDate;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['start_date']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'start_date' => $this->startDate,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
