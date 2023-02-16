<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfMessageEntity;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineKeyboardMarkup;

/**
 * Represents a link to a file stored on the Telegram servers. By default, this file will be sent by the user with an
 * optional caption. Alternatively, you can use *input\_message\_content* to send a message with the specified content
 * instead of the file.
 *
 * **Note:** This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inlinequeryresultcacheddocument
 */
class InlineQueryResultCachedDocument implements FromArrayInterface, ToArrayInterface
{
    private ?string $description = null;

    private ?string $caption = null;

    private ?string $parseMode = null;

    private ?ArrayOfMessageEntity $captionEntities = null;

    private ?InlineKeyboardMarkup $replyMarkup = null;

    private ?InputMessageContent $inputMessageContent = null;

    private function __construct(
        private string $type,
        private string $id,
        private string $title,
        private string $documentFileId
    ) {
    }

    /**
     * @param string $type Type of the result, must be *document*
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $title Title for the result
     * @param string $documentFileId A valid file identifier for the file
     */
    public static function new(string $type, string $id, string $title, string $documentFileId): self
    {
        return new self($type, $id, $title, $documentFileId);
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
     * Caption of the document to be sent, 0-1024 characters after entities parsing
     */
    public function caption(?string $caption): self
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * Mode for parsing entities in the document caption. See
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
     * Content of the message to be sent instead of the file
     */
    public function inputMessageContent(?InputMessageContent $inputMessageContent): self
    {
        $this->inputMessageContent = $inputMessageContent;
        return $this;
    }

    /**
     * Type of the result, must be *document*
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
     * Title for the result
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * A valid file identifier for the file
     */
    public function getDocumentFileId(): ?string
    {
        return $this->documentFileId;
    }

    /**
     * Short description of the result
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Caption of the document to be sent, 0-1024 characters after entities parsing
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * Mode for parsing entities in the document caption. See
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
     * Content of the message to be sent instead of the file
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

        $instance = new self($array['type'], $array['id'], $array['title'], $array['document_file_id']);

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
            'title' => $this->title,
            'document_file_id' => $this->documentFileId,
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
