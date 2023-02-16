<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents the content of a service message, sent whenever a user in the chat triggers a proximity alert
 * set by another user.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#proximityalerttriggered
 */
class ProximityAlertTriggered implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private User $traveler, private User $watcher, private int $distance)
    {
    }

    /**
     * @param User $traveler User that triggered the alert
     * @param User $watcher User that set the alert
     * @param int $distance The distance between the users
     */
    public static function new(User $traveler, User $watcher, int $distance): self
    {
        return new self($traveler, $watcher, $distance);
    }

    /**
     * User that triggered the alert
     */
    public function getTraveler(): ?User
    {
        return $this->traveler;
    }

    /**
     * User that set the alert
     */
    public function getWatcher(): ?User
    {
        return $this->watcher;
    }

    /**
     * The distance between the users
     */
    public function getDistance(): ?int
    {
        return $this->distance;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self(
            User::fromArray($array['traveler']),
            User::fromArray($array['watcher']),
            $array['distance'],
        );

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'traveler' => $this->traveler,
            'watcher' => $this->watcher,
            'distance' => $this->distance,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
