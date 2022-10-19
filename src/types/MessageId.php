<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a unique message identifier.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#messageid
 */
class MessageId implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private int $messageId)
    {
    }

    /**
     * @param int $messageId Unique message identifier
     */
    public static function new(int $messageId): self
    {
        return new self($messageId);
    }

    /**
     * Unique message identifier
     */
    public function getMessageId(): ?int
    {
        return $this->messageId;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['message_id']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'message_id' => $this->messageId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
