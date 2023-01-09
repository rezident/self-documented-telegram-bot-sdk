<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Describes why a request was unsuccessful.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#responseparameters
 */
class ResponseParameters implements FromArrayInterface, ToArrayInterface
{
    private ?int $migrateToChatId = null;

    private ?int $retryAfter = null;

    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    /**
     * The group has been migrated to a supergroup with the specified identifier. This number may have more than 32
     * significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it
     * has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing
     * this identifier.
     */
    public function migrateToChatId(?int $migrateToChatId): self
    {
        $this->migrateToChatId = $migrateToChatId;
        return $this;
    }

    /**
     * In case of exceeding flood control, the number of seconds left to wait before the request can be repeated
     */
    public function retryAfter(?int $retryAfter): self
    {
        $this->retryAfter = $retryAfter;
        return $this;
    }

    /**
     * The group has been migrated to a supergroup with the specified identifier. This number may have more than 32
     * significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it
     * has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing
     * this identifier.
     */
    public function getMigrateToChatId(): ?int
    {
        return $this->migrateToChatId;
    }

    /**
     * In case of exceeding flood control, the number of seconds left to wait before the request can be repeated
     */
    public function getRetryAfter(): ?int
    {
        return $this->retryAfter;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self();

        $instance->migrateToChatId = $array['migrate_to_chat_id'] ?? null;
        $instance->retryAfter = $array['retry_after'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'migrate_to_chat_id' => $this->migrateToChatId,
            'retry_after' => $this->retryAfter,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
