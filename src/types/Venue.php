<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a venue.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#venue
 */
class Venue implements FromArrayInterface, ToArrayInterface
{
    private ?string $foursquareId = null;

    private ?string $foursquareType = null;

    private ?string $googlePlaceId = null;

    private ?string $googlePlaceType = null;

    private function __construct(private Location $location, private string $title, private string $address)
    {
    }

    /**
     * @param Location $location Venue location. Can't be a live location
     * @param string $title Name of the venue
     * @param string $address Address of the venue
     */
    public static function new(Location $location, string $title, string $address): self
    {
        return new self($location, $title, $address);
    }

    /**
     * Foursquare identifier of the venue
     */
    public function foursquareId(?string $foursquareId): self
    {
        $this->foursquareId = $foursquareId;
        return $this;
    }

    /**
     * Foursquare type of the venue. (For example, “arts\_entertainment/default”, “arts\_entertainment/aquarium” or
     * “food/icecream”.)
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
     * Venue location. Can't be a live location
     */
    public function getLocation(): ?Location
    {
        return $this->location;
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
     * Foursquare identifier of the venue
     */
    public function getFoursquareId(): ?string
    {
        return $this->foursquareId;
    }

    /**
     * Foursquare type of the venue. (For example, “arts\_entertainment/default”, “arts\_entertainment/aquarium” or
     * “food/icecream”.)
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

        $instance = new self(Location::fromArray($array['location']), $array['title'], $array['address']);

        $instance->foursquareId = $array['foursquare_id'] ?? null;
        $instance->foursquareType = $array['foursquare_type'] ?? null;
        $instance->googlePlaceId = $array['google_place_id'] ?? null;
        $instance->googlePlaceType = $array['google_place_type'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'location' => $this->location,
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
