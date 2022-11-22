<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a service message about a change in auto-delete timer settings.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#messageautodeletetimerchanged
 */
class MessageAutoDeleteTimerChanged implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private int $messageAutoDeleteTime)
    {
    }

    /**
     * @param int $messageAutoDeleteTime New auto-delete time for messages in the chat; in seconds
     */
    public static function new(int $messageAutoDeleteTime): self
    {
        return new self($messageAutoDeleteTime);
    }

    /**
     * New auto-delete time for messages in the chat; in seconds
     */
    public function getMessageAutoDeleteTime(): ?int
    {
        return $this->messageAutoDeleteTime;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['message_auto_delete_time']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'message_auto_delete_time' => $this->messageAutoDeleteTime,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
