<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents the [content](https://core.telegram.org/bots/api#inputmessagecontent) of a venue message to be sent as the
 * result of an inline query.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inputvenuemessagecontent
 */
class InputVenueMessageContent implements FromArrayInterface, ToArrayInterface
{
    private ?string $foursquareId = null;

    private ?string $foursquareType = null;

    private ?string $googlePlaceId = null;

    private ?string $googlePlaceType = null;

    private function __construct(
        private float $latitude,
        private float $longitude,
        private string $title,
        private string $address
    ) {
    }

    /**
     * @param float $latitude Latitude of the venue in degrees
     * @param float $longitude Longitude of the venue in degrees
     * @param string $title Name of the venue
     * @param string $address Address of the venue
     */
    public static function new(float $latitude, float $longitude, string $title, string $address): self
    {
        return new self($latitude, $longitude, $title, $address);
    }

    /**
     * Foursquare identifier of the venue, if known
     */
    public function foursquareId(?string $foursquareId): self
    {
        $this->foursquareId = $foursquareId;
        return $this;
    }

    /**
     * Foursquare type of the venue, if known. (For example, “arts\_entertainment/default”,
     * “arts\_entertainment/aquarium” or “food/icecream”.)
     */
    public function foursquareType(?string $foursquareType): self
    {
        $this->foursquareType = $foursquareType;
        return $this;
    }

    /**
     * Google Places identifier of the venue
     */
    public function googlePlaceId(?string $googlePlaceId): self
    {
        $this->googlePlaceId = $googlePlaceId;
        return $this;
    }

    /**
     * Google Places type of the venue. (See
     * [supported types](https://developers.google.com/places/web-service/supported_types).)
     */
    public function googlePlaceType(?string $googlePlaceType): self
    {
        $this->googlePlaceType = $googlePlaceType;
        return $this;
    }

    /**
     * Latitude of the venue in degrees
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * Longitude of the venue in degrees
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * Name of the venue
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Address of the venue
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * Foursquare identifier of the venue, if known
     */
    public function getFoursquareId(): ?string
    {
        return $this->foursquareId;
    }

    /**
     * Foursquare type of the venue, if known. (For example, “arts\_entertainment/default”,
     * “arts\_entertainment/aquarium” or “food/icecream”.)
     */
    public function getFoursquareType(): ?string
    {
        return $this->foursquareType;
    }

    /**
     * Google Places identifier of the venue
     */
    public function getGooglePlaceId(): ?string
    {
        return $this->googlePlaceId;
    }

    /**
     * Google Places type of the venue. (See
     * [supported types](https://developers.google.com/places/web-service/supported_types).)
     */
    public function getGooglePlaceType(): ?string
    {
        return $this->googlePlaceType;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['latitude'], $array['longitude'], $array['title'], $array['address']);

        $instance->foursquareId = $array['foursquare_id'] ?? null;
        $instance->foursquareType = $array['foursquare_type'] ?? null;
        $instance->googlePlaceId = $array['google_place_id'] ?? null;
        $instance->googlePlaceType = $array['google_place_type'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'title' => $this->title,
            'address' => $this->address,
            'foursquare_id' => $this->foursquareId,
            'foursquare_type' => $this->foursquareType,
            'google_place_id' => $this->googlePlaceId,
            'google_place_type' => $this->googlePlaceType,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
