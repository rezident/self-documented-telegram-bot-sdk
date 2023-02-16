<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfMessageEntity;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineKeyboardMarkup;

/**
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound). By default, this animated MPEG-4 file
 * will be sent by the user with optional caption. Alternatively, you can use *input\_message\_content* to send a
 * message with the specified content instead of the animation.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inlinequeryresultmpeg4gif
 */
class InlineQueryResultMpeg4Gif implements FromArrayInterface, ToArrayInterface
{
    private ?int $mpeg4Width = null;

    private ?int $mpeg4Height = null;

    private ?int $mpeg4Duration = null;

    private ?string $thumbMimeType = null;

    private ?string $title = null;

    private ?string $caption = null;

    private ?string $parseMode = null;

    private ?ArrayOfMessageEntity $captionEntities = null;

    private ?InlineKeyboardMarkup $replyMarkup = null;

    private ?InputMessageContent $inputMessageContent = null;

    private function __construct(
        private string $type,
        private string $id,
        private string $mpeg4Url,
        private string $thumbUrl
    ) {
    }

    /**
     * @param string $type Type of the result, must be *mpeg4\_gif*
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $mpeg4Url A valid URL for the MPEG4 file. File size must not exceed 1MB
     * @param string $thumbUrl URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
     */
    public static function new(string $type, string $id, string $mpeg4Url, string $thumbUrl): self
    {
        return new self($type, $id, $mpeg4Url, $thumbUrl);
    }

    /**
     * Video width
     */
    public function mpeg4Width(?int $mpeg4Width): self
    {
        $this->mpeg4Width = $mpeg4Width;
        return $this;
    }

    /**
     * Video height
     */
    public function mpeg4Height(?int $mpeg4Height): self
    {
        $this->mpeg4Height = $mpeg4Height;
        return $this;
    }

    /**
     * Video duration in seconds
     */
    public function mpeg4Duration(?int $mpeg4Duration): self
    {
        $this->mpeg4Duration = $mpeg4Duration;
        return $this;
    }

    /**
     * MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to “image/jpeg”
     */
    public function thumbMimeType(?string $thumbMimeType): self
    {
        $this->thumbMimeType = $thumbMimeType;
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
     * Caption of the MPEG-4 file to be sent, 0-1024 characters after entities parsing
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
     * Content of the message to be sent instead of the video animation
     */
    public function inputMessageContent(?InputMessageContent $inputMessageContent): self
    {
        $this->inputMessageContent = $inputMessageContent;
        return $this;
    }

    /**
     * Type of the result, must be *mpeg4\_gif*
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
     * A valid URL for the MPEG4 file. File size must not exceed 1MB
     */
    public function getMpeg4Url(): ?string
    {
        return $this->mpeg4Url;
    }

    /**
     * Video width
     */
    public function getMpeg4Width(): ?int
    {
        return $this->mpeg4Width;
    }

    /**
     * Video height
     */
    public function getMpeg4Height(): ?int
    {
        return $this->mpeg4Height;
    }

    /**
     * Video duration in seconds
     */
    public function getMpeg4Duration(): ?int
    {
        return $this->mpeg4Duration;
    }

    /**
     * URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
     */
    public function getThumbUrl(): ?string
    {
        return $this->thumbUrl;
    }

    /**
     * MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to “image/jpeg”
     */
    public function getThumbMimeType(): ?string
    {
        return $this->thumbMimeType;
    }

    /**
     * Title for the result
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Caption of the MPEG-4 file to be sent, 0-1024 characters after entities parsing
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
     * Content of the message to be sent instead of the video animation
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

        $instance = new self($array['type'], $array['id'], $array['mpeg4_url'], $array['thumb_url']);

        $instance->mpeg4Width = $array['mpeg4_width'] ?? null;
        $instance->mpeg4Height = $array['mpeg4_height'] ?? null;
        $instance->mpeg4Duration = $array['mpeg4_duration'] ?? null;
        $instance->thumbMimeType = $array['thumb_mime_type'] ?? null;
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
            'mpeg4_url' => $this->mpeg4Url,
            'mpeg4_width' => $this->mpeg4Width,
            'mpeg4_height' => $this->mpeg4Height,
            'mpeg4_duration' => $this->mpeg4Duration,
            'thumb_url' => $this->thumbUrl,
            'thumb_mime_type' => $this->thumbMimeType,
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
