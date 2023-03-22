<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineKeyboardMarkup;

/**
 * Represents a location on a map. By default, the location will be sent by the user. Alternatively, you can use
 * *input\_message\_content* to send a message with the specified content instead of the location.
 *
 * **Note:** This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inlinequeryresultlocation
 */
class InlineQueryResultLocation implements FromArrayInterface, ToArrayInterface
{
    private ?float $horizontalAccuracy = null;

    private ?int $livePeriod = null;

    private ?int $heading = null;

    private ?int $proximityAlertRadius = null;

    private ?InlineKeyboardMarkup $replyMarkup = null;

    private ?InputMessageContent $inputMessageContent = null;

    private ?string $thumbnailUrl = null;

    private ?int $thumbnailWidth = null;

    private ?int $thumbnailHeight = null;

    private function __construct(
        private string $type,
        private string $id,
        private float $latitude,
        private float $longitude,
        private string $title
    ) {
    }

    /**
     * @param string $type Type of the result, must be *location*
     * @param string $id Unique identifier for this result, 1-64 Bytes
     * @param float $latitude Location latitude in degrees
     * @param float $longitude Location longitude in degrees
     * @param string $title Location title
     */
    public static function new(string $type, string $id, float $latitude, float $longitude, string $title): self
    {
        return new self($type, $id, $latitude, $longitude, $title);
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
     * [Inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) attached to the message
     */
    public function replyMarkup(?InlineKeyboardMarkup $replyMarkup): self
    {
        $this->replyMarkup = $replyMarkup;
        return $this;
    }

    /**
     * Content of the message to be sent instead of the location
     */
    public function inputMessageContent(?InputMessageContent $inputMessageContent): self
    {
        $this->inputMessageContent = $inputMessageContent;
        return $this;
    }

    /**
     * Url of the thumbnail for the result
     */
    public function thumbnailUrl(?string $thumbnailUrl): self
    {
        $this->thumbnailUrl = $thumbnailUrl;
        return $this;
    }

    /**
     * Thumbnail width
     */
    public function thumbnailWidth(?int $thumbnailWidth): self
    {
        $this->thumbnailWidth = $thumbnailWidth;
        return $this;
    }

    /**
     * Thumbnail height
     */
    public function thumbnailHeight(?int $thumbnailHeight): self
    {
        $this->thumbnailHeight = $thumbnailHeight;
        return $this;
    }

    /**
     * Type of the result, must be *location*
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
     * Location latitude in degrees
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * Location longitude in degrees
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * Location title
     */
    public function getTitle(): ?string
    {
        return $this->title;
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

    /**
     * [Inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) attached to the message
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->replyMarkup;
    }

    /**
     * Content of the message to be sent instead of the location
     */
    public function getInputMessageContent(): ?InputMessageContent
    {
        return $this->inputMessageContent;
    }

    /**
     * Url of the thumbnail for the result
     */
    public function getThumbnailUrl(): ?string
    {
        return $this->thumbnailUrl;
    }

    /**
     * Thumbnail width
     */
    public function getThumbnailWidth(): ?int
    {
        return $this->thumbnailWidth;
    }

    /**
     * Thumbnail height
     */
    public function getThumbnailHeight(): ?int
    {
        return $this->thumbnailHeight;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['type'], $array['id'], $array['latitude'], $array['longitude'], $array['title']);

        $instance->horizontalAccuracy = $array['horizontal_accuracy'] ?? null;
        $instance->livePeriod = $array['live_period'] ?? null;
        $instance->heading = $array['heading'] ?? null;
        $instance->proximityAlertRadius = $array['proximity_alert_radius'] ?? null;
        $instance->replyMarkup = InlineKeyboardMarkup::fromArray($array['reply_markup'] ?? null);
        $instance->inputMessageContent = InputMessageContent::fromArray($array['input_message_content'] ?? null);
        $instance->thumbnailUrl = $array['thumbnail_url'] ?? null;
        $instance->thumbnailWidth = $array['thumbnail_width'] ?? null;
        $instance->thumbnailHeight = $array['thumbnail_height'] ?? null;

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
            'horizontal_accuracy' => $this->horizontalAccuracy,
            'live_period' => $this->livePeriod,
            'heading' => $this->heading,
            'proximity_alert_radius' => $this->proximityAlertRadius,
            'reply_markup' => $this->replyMarkup,
            'input_message_content' => $this->inputMessageContent,
            'thumbnail_url' => $this->thumbnailUrl,
            'thumbnail_width' => $this->thumbnailWidth,
            'thumbnail_height' => $this->thumbnailHeight,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
