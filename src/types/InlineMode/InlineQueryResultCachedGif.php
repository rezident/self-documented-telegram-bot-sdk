<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfMessageEntity;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineKeyboardMarkup;

/**
 * Represents a link to an animated GIF file stored on the Telegram servers. By default, this animated GIF file will be
 * sent by the user with an optional caption. Alternatively, you can use *input\_message\_content* to send a message
 * with specified content instead of the animation.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedgif
 */
class InlineQueryResultCachedGif implements FromArrayInterface, ToArrayInterface
{
    private ?string $title = null;

    private ?string $caption = null;

    private ?string $parseMode = null;

    private ?ArrayOfMessageEntity $captionEntities = null;

    private ?InlineKeyboardMarkup $replyMarkup = null;

    private ?InputMessageContent $inputMessageContent = null;

    private function __construct(private string $type, private string $id, private string $gifFileId)
    {
    }

    /**
     * @param string $type Type of the result, must be *gif*
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $gifFileId A valid file identifier for the GIF file
     */
    public static function new(string $type, string $id, string $gifFileId): self
    {
        return new self($type, $id, $gifFileId);
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
     * A valid file identifier for the GIF file
     */
    public function getGifFileId(): ?string
    {
        return $this->gifFileId;
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

        $instance = new self($array['type'], $array['id'], $array['gif_file_id']);

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
            'gif_file_id' => $this->gifFileId,
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
