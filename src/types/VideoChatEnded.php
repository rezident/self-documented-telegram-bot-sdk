<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a service message about a video chat ended in the chat.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#videochatended
 */
class VideoChatEnded implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private int $duration)
    {
    }

    /**
     * @param int $duration Video chat duration in seconds
     */
    public static function new(int $duration): self
    {
        return new self($duration);
    }

    /**
     * Video chat duration in seconds
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['duration']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'duration' => $this->duration,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
