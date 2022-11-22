<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineKeyboardMarkup;

/**
 * Represents a venue. By default, the venue will be sent by the user. Alternatively, you can use
 * *input\_message\_content* to send a message with the specified content instead of the venue.
 *
 * **Note:** This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inlinequeryresultvenue
 */
class InlineQueryResultVenue implements FromArrayInterface, ToArrayInterface
{
    private ?string $foursquareId = null;

    private ?string $foursquareType = null;

    private ?string $googlePlaceId = null;

    private ?string $googlePlaceType = null;

    private ?InlineKeyboardMarkup $replyMarkup = null;

    private ?InputMessageContent $inputMessageContent = null;

    private ?string $thumbUrl = null;

    private ?int $thumbWidth = null;

    private ?int $thumbHeight = null;

    private function __construct(
        private string $type,
        private string $id,
        private float $latitude,
        private float $longitude,
        private string $title,
        private string $address
    ) {
    }

    /**
     * @param string $type Type of the result, must be *venue*
     * @param string $id Unique identifier for this result, 1-64 Bytes
     * @param float $latitude Latitude of the venue location in degrees
     * @param float $longitude Longitude of the venue location in degrees
     * @param string $title Title of the venue
     * @param string $address Address of the venue
     */
    public static function new(
        string $type,
        string $id,
        float $latitude,
        float $longitude,
        string $title,
        string $address,
    ): self {
        return new self($type, $id, $latitude, $longitude, $title, $address);
    }

    /**
     * Foursquare identifier of the venue if known
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
     * [Inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) attached to the message
     */
    public function replyMarkup(?InlineKeyboardMarkup $replyMarkup): self
    {
        $this->replyMarkup = $replyMarkup;
        return $this;
    }

    /**
     * Content of the message to be sent instead of the venue
     */
    public function inputMessageContent(?InputMessageContent $inputMessageContent): self
    {
        $this->inputMessageContent = $inputMessageContent;
        return $this;
    }

    /**
     * Url of the thumbnail for the result
     */
    public function thumbUrl(?string $thumbUrl): self
    {
        $this->thumbUrl = $thumbUrl;
        return $this;
    }

    /**
     * Thumbnail width
     */
    public function thumbWidth(?int $thumbWidth): self
    {
        $this->thumbWidth = $thumbWidth;
        return $this;
    }

    /**
     * Thumbnail height
     */
    public function thumbHeight(?int $thumbHeight): self
    {
        $this->thumbHeight = $thumbHeight;
        return $this;
    }

    /**
     * Type of the result, must be *venue*
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Unique identifier for this result, 1-64 Bytes
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Latitude of the venue location in degrees
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * Longitude of the venue location in degrees
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * Title of the venue
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
     * Foursquare identifier of the venue if known
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

    /**
     * [Inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) attached to the message
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->replyMarkup;
    }

    /**
     * Content of the message to be sent instead of the venue
     */
    public function getInputMessageContent(): ?InputMessageContent
    {
        return $this->inputMessageContent;
    }

    /**
     * Url of the thumbnail for the result
     */
    public function getThumbUrl(): ?string
    {
        return $this->thumbUrl;
    }

    /**
     * Thumbnail width
     */
    public function getThumbWidth(): ?int
    {
        return $this->thumbWidth;
    }

    /**
     * Thumbnail height
     */
    public function getThumbHeight(): ?int
    {
        return $this->thumbHeight;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self(
            $array['type'],
            $array['id'],
            $array['latitude'],
            $array['longitude'],
            $array['title'],
            $array['address'],
        );

        $instance->foursquareId = $array['foursquare_id'] ?? null;
        $instance->foursquareType = $array['foursquare_type'] ?? null;
        $instance->googlePlaceId = $array['google_place_id'] ?? null;
        $instance->googlePlaceType = $array['google_place_type'] ?? null;
        $instance->replyMarkup = InlineKeyboardMarkup::fromArray($array['reply_markup'] ?? null);
        $instance->inputMessageContent = InputMessageContent::fromArray($array['input_message_content'] ?? null);
        $instance->thumbUrl = $array['thumb_url'] ?? null;
        $instance->thumbWidth = $array['thumb_width'] ?? null;
        $instance->thumbHeight = $array['thumb_height'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'type' => $this->type,
            'id' => $this->id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'title' => $this->title,
            'address' => $this->address,
            'foursquare_id' => $this->foursquareId,
            'foursquare_type' => $this->foursquareType,
            'google_place_id' => $this->googlePlaceId,
            'google_place_type' => $this->googlePlaceType,
            'reply_markup' => $this->replyMarkup,
            'input_message_content' => $this->inputMessageContent,
            'thumb_url' => $this->thumbUrl,
            'thumb_width' => $this->thumbWidth,
            'thumb_height' => $this->thumbHeight,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
