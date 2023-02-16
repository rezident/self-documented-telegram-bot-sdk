<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\GettingUpdates;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfString;

/**
 * Describes the current status of a webhook.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#webhookinfo
 */
class WebhookInfo implements FromArrayInterface, ToArrayInterface
{
    private ?string $ipAddress = null;

    private ?int $lastErrorDate = null;

    private ?string $lastErrorMessage = null;

    private ?int $lastSynchronizationErrorDate = null;

    private ?int $maxConnections = null;

    private ?ArrayOfString $allowedUpdates = null;

    private function __construct(
        private string $url,
        private bool $hasCustomCertificate,
        private int $pendingUpdateCount
    ) {
    }

    /**
     * @param string $url Webhook URL, may be empty if webhook is not set up
     * @param bool $hasCustomCertificate *True*, if a custom certificate was provided for webhook certificate checks
     * @param int $pendingUpdateCount Number of updates awaiting delivery
     */
    public static function new(string $url, bool $hasCustomCertificate, int $pendingUpdateCount): self
    {
        return new self($url, $hasCustomCertificate, $pendingUpdateCount);
    }

    /**
     * Currently used webhook IP address
     */
    public function ipAddress(?string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    /**
     * Unix time for the most recent error that happened when trying to deliver an update via webhook
     */
    public function lastErrorDate(?int $lastErrorDate): self
    {
        $this->lastErrorDate = $lastErrorDate;
        return $this;
    }

    /**
     * Error message in human-readable format for the most recent error that happened when trying to deliver an update
     * via webhook
     */
    public function lastErrorMessage(?string $lastErrorMessage): self
    {
        $this->lastErrorMessage = $lastErrorMessage;
        return $this;
    }

    /**
     * Unix time of the most recent error that happened when trying to synchronize available updates with Telegram
     * datacenters
     */
    public function lastSynchronizationErrorDate(?int $lastSynchronizationErrorDate): self
    {
        $this->lastSynchronizationErrorDate = $lastSynchronizationErrorDate;
        return $this;
    }

    /**
     * The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
     */
    public function maxConnections(?int $maxConnections): self
    {
        $this->maxConnections = $maxConnections;
        return $this;
    }

    /**
     * A list of update types the bot is subscribed to. Defaults to all update types except *chat\_member*
     */
    public function allowedUpdates(?ArrayOfString $allowedUpdates): self
    {
        $this->allowedUpdates = $allowedUpdates;
        return $this;
    }

    /**
     * Webhook URL, may be empty if webhook is not set up
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * *True*, if a custom certificate was provided for webhook certificate checks
     */
    public function getHasCustomCertificate(): ?bool
    {
        return $this->hasCustomCertificate;
    }

    /**
     * Number of updates awaiting delivery
     */
    public function getPendingUpdateCount(): ?int
    {
        return $this->pendingUpdateCount;
    }

    /**
     * Currently used webhook IP address
     */
    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    /**
     * Unix time for the most recent error that happened when trying to deliver an update via webhook
     */
    public function getLastErrorDate(): ?int
    {
        return $this->lastErrorDate;
    }

    /**
     * Error message in human-readable format for the most recent error that happened when trying to deliver an update
     * via webhook
     */
    public function getLastErrorMessage(): ?string
    {
        return $this->lastErrorMessage;
    }

    /**
     * Unix time of the most recent error that happened when trying to synchronize available updates with Telegram
     * datacenters
     */
    public function getLastSynchronizationErrorDate(): ?int
    {
        return $this->lastSynchronizationErrorDate;
    }

    /**
     * The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
     */
    public function getMaxConnections(): ?int
    {
        return $this->maxConnections;
    }

    /**
     * A list of update types the bot is subscribed to. Defaults to all update types except *chat\_member*
     */
    public function getAllowedUpdates(): ?ArrayOfString
    {
        return $this->allowedUpdates;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['url'], $array['has_custom_certificate'], $array['pending_update_count']);

        $instance->ipAddress = $array['ip_address'] ?? null;
        $instance->lastErrorDate = $array['last_error_date'] ?? null;
        $instance->lastErrorMessage = $array['last_error_message'] ?? null;
        $instance->lastSynchronizationErrorDate = $array['last_synchronization_error_date'] ?? null;
        $instance->maxConnections = $array['max_connections'] ?? null;
        $instance->allowedUpdates = ArrayOfString::fromArray($array['allowed_updates'] ?? null);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'url' => $this->url,
            'has_custom_certificate' => $this->hasCustomCertificate,
            'pending_update_count' => $this->pendingUpdateCount,
            'ip_address' => $this->ipAddress,
            'last_error_date' => $this->lastErrorDate,
            'last_error_message' => $this->lastErrorMessage,
            'last_synchronization_error_date' => $this->lastSynchronizationErrorDate,
            'max_connections' => $this->maxConnections,
            'allowed_updates' => $this->allowedUpdates,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
