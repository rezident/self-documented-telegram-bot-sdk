<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfMessageEntity;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineKeyboardMarkup;

/**
 * Represents a link to a page containing an embedded video player or a video file. By default, this video file will be
 * sent by the user with an optional caption. Alternatively, you can use *input\_message\_content* to send a message
 * with the specified content instead of the video.
 *
 * > If an InlineQueryResultVideo message contains an embedded video (e.g., YouTube), you **must** replace its content
 * using *input\_message\_content*.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inlinequeryresultvideo
 */
class InlineQueryResultVideo implements FromArrayInterface, ToArrayInterface
{
    private ?string $caption = null;

    private ?string $parseMode = null;

    private ?ArrayOfMessageEntity $captionEntities = null;

    private ?int $videoWidth = null;

    private ?int $videoHeight = null;

    private ?int $videoDuration = null;

    private ?string $description = null;

    private ?InlineKeyboardMarkup $replyMarkup = null;

    private ?InputMessageContent $inputMessageContent = null;

    private function __construct(
        private string $type,
        private string $id,
        private string $videoUrl,
        private string $mimeType,
        private string $thumbUrl,
        private string $title
    ) {
    }

    /**
     * @param string $type Type of the result, must be *video*
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $videoUrl A valid URL for the embedded video player or video file
     * @param string $mimeType MIME type of the content of the video URL, “text/html” or “video/mp4”
     * @param string $thumbUrl URL of the thumbnail (JPEG only) for the video
     * @param string $title Title for the result
     */
    public static function new(
        string $type,
        string $id,
        string $videoUrl,
        string $mimeType,
        string $thumbUrl,
        string $title,
    ): self {
        return new self($type, $id, $videoUrl, $mimeType, $thumbUrl, $title);
    }

    /**
     * Caption of the video to be sent, 0-1024 characters after entities parsing
     */
    public function caption(?string $caption): self
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * Mode for parsing entities in the video caption. See
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
     * Video width
     */
    public function videoWidth(?int $videoWidth): self
    {
        $this->videoWidth = $videoWidth;
        return $this;
    }

    /**
     * Video height
     */
    public function videoHeight(?int $videoHeight): self
    {
        $this->videoHeight = $videoHeight;
        return $this;
    }

    /**
     * Video duration in seconds
     */
    public function videoDuration(?int $videoDuration): self
    {
        $this->videoDuration = $videoDuration;
        return $this;
    }

    /**
     * Short description of the result
     */
    public function description(?string $description): self
    {
        $this->description = $description;
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
     * Content of the message to be sent instead of the video. This field is **required** if InlineQueryResultVideo is
     * used to send an HTML-page as a result (e.g., a YouTube video).
     */
    public function inputMessageContent(?InputMessageContent $inputMessageContent): self
    {
        $this->inputMessageContent = $inputMessageContent;
        return $this;
    }

    /**
     * Type of the result, must be *video*
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
     * A valid URL for the embedded video player or video file
     */
    public function getVideoUrl(): ?string
    {
        return $this->videoUrl;
    }

    /**
     * MIME type of the content of the video URL, “text/html” or “video/mp4”
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    /**
     * URL of the thumbnail (JPEG only) for the video
     */
    public function getThumbUrl(): ?string
    {
        return $this->thumbUrl;
    }

    /**
     * Title for the result
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Caption of the video to be sent, 0-1024 characters after entities parsing
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * Mode for parsing entities in the video caption. See
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
     * Video width
     */
    public function getVideoWidth(): ?int
    {
        return $this->videoWidth;
    }

    /**
     * Video height
     */
    public function getVideoHeight(): ?int
    {
        return $this->videoHeight;
    }

    /**
     * Video duration in seconds
     */
    public function getVideoDuration(): ?int
    {
        return $this->videoDuration;
    }

    /**
     * Short description of the result
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * [Inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) attached to the message
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->replyMarkup;
    }

    /**
     * Content of the message to be sent instead of the video. This field is **required** if InlineQueryResultVideo is
     * used to send an HTML-page as a result (e.g., a YouTube video).
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

        $instance = new self(
            $array['type'],
            $array['id'],
            $array['video_url'],
            $array['mime_type'],
            $array['thumb_url'],
            $array['title'],
        );

        $instance->caption = $array['caption'] ?? null;
        $instance->parseMode = $array['parse_mode'] ?? null;
        $instance->captionEntities = ArrayOfMessageEntity::fromArray($array['caption_entities'] ?? null);
        $instance->videoWidth = $array['video_width'] ?? null;
        $instance->videoHeight = $array['video_height'] ?? null;
        $instance->videoDuration = $array['video_duration'] ?? null;
        $instance->description = $array['description'] ?? null;
        $instance->replyMarkup = InlineKeyboardMarkup::fromArray($array['reply_markup'] ?? null);
        $instance->inputMessageContent = InputMessageContent::fromArray($array['input_message_content'] ?? null);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'type' => $this->type,
            'id' => $this->id,
            'video_url' => $this->videoUrl,
            'mime_type' => $this->mimeType,
            'thumb_url' => $this->thumbUrl,
            'title' => $this->title,
            'caption' => $this->caption,
            'parse_mode' => $this->parseMode,
            'caption_entities' => $this->captionEntities,
            'video_width' => $this->videoWidth,
            'video_height' => $this->videoHeight,
            'video_duration' => $this->videoDuration,
            'description' => $this->description,
            'reply_markup' => $this->replyMarkup,
            'input_message_content' => $this->inputMessageContent,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
