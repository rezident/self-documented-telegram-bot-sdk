<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfMessageEntity;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineKeyboardMarkup;

/**
 * Represents a link to a photo. By default, this photo will be sent by the user with optional caption. Alternatively,
 * you can use *input\_message\_content* to send a message with the specified content instead of the photo.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inlinequeryresultphoto
 */
class InlineQueryResultPhoto implements FromArrayInterface, ToArrayInterface
{
    private ?int $photoWidth = null;

    private ?int $photoHeight = null;

    private ?string $title = null;

    private ?string $description = null;

    private ?string $caption = null;

    private ?string $parseMode = null;

    private ?ArrayOfMessageEntity $captionEntities = null;

    private ?InlineKeyboardMarkup $replyMarkup = null;

    private ?InputMessageContent $inputMessageContent = null;

    private function __construct(
        private string $type,
        private string $id,
        private string $photoUrl,
        private string $thumbUrl
    ) {
    }

    /**
     * @param string $type Type of the result, must be *photo*
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $photoUrl A valid URL of the photo. Photo must be in **JPEG** format. Photo size must not exceed
     *                         5MB
     * @param string $thumbUrl URL of the thumbnail for the photo
     */
    public static function new(string $type, string $id, string $photoUrl, string $thumbUrl): self
    {
        return new self($type, $id, $photoUrl, $thumbUrl);
    }

    /**
     * Width of the photo
     */
    public function photoWidth(?int $photoWidth): self
    {
        $this->photoWidth = $photoWidth;
        return $this;
    }

    /**
     * Height of the photo
     */
    public function photoHeight(?int $photoHeight): self
    {
        $this->photoHeight = $photoHeight;
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
     * Short description of the result
     */
    public function description(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Caption of the photo to be sent, 0-1024 characters after entities parsing
     */
    public function caption(?string $caption): self
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * Mode for parsing entities in the photo caption. See
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
     * Content of the message to be sent instead of the photo
     */
    public function inputMessageContent(?InputMessageContent $inputMessageContent): self
    {
        $this->inputMessageContent = $inputMessageContent;
        return $this;
    }

    /**
     * Type of the result, must be *photo*
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
     * A valid URL of the photo. Photo must be in **JPEG** format. Photo size must not exceed 5MB
     */
    public function getPhotoUrl(): ?string
    {
        return $this->photoUrl;
    }

    /**
     * URL of the thumbnail for the photo
     */
    public function getThumbUrl(): ?string
    {
        return $this->thumbUrl;
    }

    /**
     * Width of the photo
     */
    public function getPhotoWidth(): ?int
    {
        return $this->photoWidth;
    }

    /**
     * Height of the photo
     */
    public function getPhotoHeight(): ?int
    {
        return $this->photoHeight;
    }

    /**
     * Title for the result
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Short description of the result
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Caption of the photo to be sent, 0-1024 characters after entities parsing
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * Mode for parsing entities in the photo caption. See
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
     * Content of the message to be sent instead of the photo
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

        $instance = new self($array['type'], $array['id'], $array['photo_url'], $array['thumb_url']);

        $instance->photoWidth = $array['photo_width'] ?? null;
        $instance->photoHeight = $array['photo_height'] ?? null;
        $instance->title = $array['title'] ?? null;
        $instance->description = $array['description'] ?? null;
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
            'photo_url' => $this->photoUrl,
            'thumb_url' => $this->thumbUrl,
            'photo_width' => $this->photoWidth,
            'photo_height' => $this->photoHeight,
            'title' => $this->title,
            'description' => $this->description,
            'caption' => $this->caption,
            'parse_mode' => $this->parseMode,
            'caption_entities' => $this->captionEntities,
            'reply_markup' => $this->replyMarkup,
            'input_message_content' => $this->inputMessageContent,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
