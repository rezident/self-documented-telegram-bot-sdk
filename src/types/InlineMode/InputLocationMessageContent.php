<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents the [content](https://core.telegram.org/bots/api#inputmessagecontent) of a location message to be sent as
 * the result of an inline query.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inputlocationmessagecontent
 */
class InputLocationMessageContent implements FromArrayInterface, ToArrayInterface
{
    private ?float $horizontalAccuracy = null;

    private ?int $livePeriod = null;

    private ?int $heading = null;

    private ?int $proximityAlertRadius = null;

    private function __construct(private float $latitude, private float $longitude)
    {
    }

    /**
     * @param float $latitude Latitude of the location in degrees
     * @param float $longitude Longitude of the location in degrees
     */
    public static function new(float $latitude, float $longitude): self
    {
        return new self($latitude, $longitude);
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
     * Period in seconds for which the location can be updated, should be between 60 and 86400.
     */
    public function livePeriod(?int $livePeriod): self
    {
        $this->livePeriod = $livePeriod;
        return $this;
    }

    /**
     * For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
     */
    public function heading(?int $heading): self
    {
        $this->heading = $heading;
        return $this;
    }

    /**
     * For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters.
     * Must be between 1 and 100000 if specified.
     */
    public function proximityAlertRadius(?int $proximityAlertRadius): self
    {
        $this->proximityAlertRadius = $proximityAlertRadius;
        return $this;
    }

    /**
     * Latitude of the location in degrees
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * Longitude of the location in degrees
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * The radius of uncertainty for the location, measured in meters; 0-1500
     */
    public function getHorizontalAccuracy(): ?float
    {
        return $this->horizontalAccuracy;
    }

    /**
     * Period in seconds for which the location can be updated, should be between 60 and 86400.
     */
    public function getLivePeriod(): ?int
    {
        return $this->livePeriod;
    }

    /**
     * For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
     */
    public function getHeading(): ?int
    {
        return $this->heading;
    }

    /**
     * For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters.
     * Must be between 1 and 100000 if specified.
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

        $instance = new self($array['latitude'], $array['longitude']);

        $instance->horizontalAccuracy = $array['horizontal_accuracy'] ?? null;
        $instance->livePeriod = $array['live_period'] ?? null;
        $instance->heading = $array['heading'] ?? null;
        $instance->proximityAlertRadius = $array['proximity_alert_radius'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'horizontal_accuracy' => $this->horizontalAccuracy,
            'live_period' => $this->livePeriod,
            'heading' => $this->heading,
            'proximity_alert_radius' => $this->proximityAlertRadius,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
