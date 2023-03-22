<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfMessageEntity;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineKeyboardMarkup;

/**
 * Represents a link to an animated GIF file. By default, this animated GIF file will be sent by the user with optional
 * caption. Alternatively, you can use *input\_message\_content* to send a message with the specified content instead of
 * the animation.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inlinequeryresultgif
 */
class InlineQueryResultGif implements FromArrayInterface, ToArrayInterface
{
    private ?int $gifWidth = null;

    private ?int $gifHeight = null;

    private ?int $gifDuration = null;

    private ?string $thumbnailMimeType = null;

    private ?string $title = null;

    private ?string $caption = null;

    private ?string $parseMode = null;

    private ?ArrayOfMessageEntity $captionEntities = null;

    private ?InlineKeyboardMarkup $replyMarkup = null;

    private ?InputMessageContent $inputMessageContent = null;

    private function __construct(
        private string $type,
        private string $id,
        private string $gifUrl,
        private string $thumbnailUrl
    ) {
    }

    /**
     * @param string $type Type of the result, must be *gif*
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $gifUrl A valid URL for the GIF file. File size must not exceed 1MB
     * @param string $thumbnailUrl URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
     */
    public static function new(string $type, string $id, string $gifUrl, string $thumbnailUrl): self
    {
        return new self($type, $id, $gifUrl, $thumbnailUrl);
    }

    /**
     * Width of the GIF
     */
    public function gifWidth(?int $gifWidth): self
    {
        $this->gifWidth = $gifWidth;
        return $this;
    }

    /**
     * Height of the GIF
     */
    public function gifHeight(?int $gifHeight): self
    {
        $this->gifHeight = $gifHeight;
        return $this;
    }

    /**
     * Duration of the GIF in seconds
     */
    public function gifDuration(?int $gifDuration): self
    {
        $this->gifDuration = $gifDuration;
        return $this;
    }

    /**
     * MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to “image/jpeg”
     */
    public function thumbnailMimeType(?string $thumbnailMimeType): self
    {
        $this->thumbnailMimeType = $thumbnailMimeType;
        return $this;
    }

    /**
     * Title for the result
     */
    public function title(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Caption of the GIF file to be sent, 0-1024 characters after entities parsing
     */
    public function caption(?string $caption): self
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * Mode for parsing entities in the caption. See
     * [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details.
     */
    public function parseMode(?string $parseMode): self
    {
        $this->parseMode = $parseMode;
        return $this;
    }

    /**
     * List of special entities that appear in the caption, which can be specified instead of *parse\_mode*
     */
    public function captionEntities(?ArrayOfMessageEntity $captionEntities): self
    {
        $this->captionEntities = $captionEntities;
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
     * Content of the message to be sent instead of the GIF animation
     */
    public function inputMessageContent(?InputMessageContent $inputMessageContent): self
    {
        $this->inputMessageContent = $inputMessageContent;
        return $this;
    }

    /**
     * Type of the result, must be *gif*
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Unique identifier for this result, 1-64 bytes
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * A valid URL for the GIF file. File size must not exceed 1MB
     */
    public function getGifUrl(): ?string
    {
        return $this->gifUrl;
    }

    /**
     * Width of the GIF
     */
    public function getGifWidth(): ?int
    {
        return $this->gifWidth;
    }

    /**
     * Height of the GIF
     */
    public function getGifHeight(): ?int
    {
        return $this->gifHeight;
    }

    /**
     * Duration of the GIF in seconds
     */
    public function getGifDuration(): ?int
    {
        return $this->gifDuration;
    }

    /**
     * URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
     */
    public function getThumbnailUrl(): ?string
    {
        return $this->thumbnailUrl;
    }

    /**
     * MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to “image/jpeg”
     */
    public function getThumbnailMimeType(): ?string
    {
        return $this->thumbnailMimeType;
    }

    /**
     * Title for the result
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Caption of the GIF file to be sent, 0-1024 characters after entities parsing
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * Mode for parsing entities in the caption. See
     * [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details.
     */
    public function getParseMode(): ?string
    {
        return $this->parseMode;
    }

    /**
     * List of special entities that appear in the caption, which can be specified instead of *parse\_mode*
     */
    public function getCaptionEntities(): ?ArrayOfMessageEntity
    {
        return $this->captionEntities;
    }

    /**
     * [Inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) attached to the message
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->replyMarkup;
    }

    /**
     * Content of the message to be sent instead of the GIF animation
     */
    public function getInputMessageContent(): ?InputMessageContent
    {
        return $this->inputMessageContent;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['type'], $array['id'], $array['gif_url'], $array['thumbnail_url']);

        $instance->gifWidth = $array['gif_width'] ?? null;
        $instance->gifHeight = $array['gif_height'] ?? null;
        $instance->gifDuration = $array['gif_duration'] ?? null;
        $instance->thumbnailMimeType = $array['thumbnail_mime_type'] ?? null;
        $instance->title = $array['title'] ?? null;
        $instance->caption = $array['caption'] ?? null;
        $instance->parseMode = $array['parse_mode'] ?? null;
        $instance->captionEntities = ArrayOfMessageEntity::fromArray($array['caption_entities'] ?? null);
        $instance->replyMarkup = InlineKeyboardMarkup::fromArray($array['reply_markup'] ?? null);
        $instance->inputMessageContent = InputMessageContent::fromArray($array['input_message_content'] ?? null);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'type' => $this->type,
            'id' => $this->id,
            'gif_url' => $this->gifUrl,
            'gif_width' => $this->gifWidth,
            'gif_height' => $this->gifHeight,
            'gif_duration' => $this->gifDuration,
            'thumbnail_url' => $this->thumbnailUrl,
            'thumbnail_mime_type' => $this->thumbnailMimeType,
            'title' => $this->title,
            'caption' => $this->caption,
            'parse_mode' => $this->parseMode,
            'caption_entities' => $this->captionEntities,
            'reply_markup' => $this->replyMarkup,
            'input_message_content' => $this->inputMessageContent,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
