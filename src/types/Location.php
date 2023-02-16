<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a point on the map.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#location
 */
class Location implements FromArrayInterface, ToArrayInterface
{
    private ?float $horizontalAccuracy = null;

    private ?int $livePeriod = null;

    private ?int $heading = null;

    private ?int $proximityAlertRadius = null;

    private function __construct(private float $longitude, private float $latitude)
    {
    }

    /**
     * @param float $longitude Longitude as defined by sender
     * @param float $latitude Latitude as defined by sender
     */
    public static function new(float $longitude, float $latitude): self
    {
        return new self($longitude, $latitude);
    }

    /**
     * The radius of uncertainty for the location, measured in meters; 0-1500
     */
    public function horizontalAccuracy(?float $horizontalAccuracy): self
    {
        $this->horizontalAccuracy = $horizontalAccuracy;
        return $this;
    }

    /**
     * Time relative to the message sending date, during which the location can be updated; in seconds. For active live
     * locations only.
     */
    public function livePeriod(?int $livePeriod): self
    {
        $this->livePeriod = $livePeriod;
        return $this;
    }

    /**
     * The direction in which user is moving, in degrees; 1-360. For active live locations only.
     */
    public function heading(?int $heading): self
    {
        $this->heading = $heading;
        return $this;
    }

    /**
     * The maximum distance for proximity alerts about approaching another chat member, in meters. For sent live
     * locations only.
     */
    public function proximityAlertRadius(?int $proximityAlertRadius): self
    {
        $this->proximityAlertRadius = $proximityAlertRadius;
        return $this;
    }

    /**
     * Longitude as defined by sender
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * Latitude as defined by sender
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * The radius of uncertainty for the location, measured in meters; 0-1500
     */
    public function getHorizontalAccuracy(): ?float
    {
        return $this->horizontalAccuracy;
    }

    /**
     * Time relative to the message sending date, during which the location can be updated; in seconds. For active live
     * locations only.
     */
    public function getLivePeriod(): ?int
    {
        return $this->livePeriod;
    }

    /**
     * The direction in which user is moving, in degrees; 1-360. For active live locations only.
     */
    public function getHeading(): ?int
    {
        return $this->heading;
    }

    /**
     * The maximum distance for proximity alerts about approaching another chat member, in meters. For sent live
     * locations only.
     */
    public function getProximityAlertRadius(): ?int
    {
        return $this->proximityAlertRadius;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['longitude'], $array['latitude']);

        $instance->horizontalAccuracy = $array['horizontal_accuracy'] ?? null;
        $instance->livePeriod = $array['live_period'] ?? null;
        $instance->heading = $array['heading'] ?? null;
        $instance->proximityAlertRadius = $array['proximity_alert_radius'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'horizontal_accuracy' => $this->horizontalAccuracy,
            'live_period' => $this->livePeriod,
            'heading' => $this->heading,
            'proximity_alert_radius' => $this->proximityAlertRadius,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
