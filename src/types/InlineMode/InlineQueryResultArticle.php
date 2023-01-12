<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineKeyboardMarkup;

/**
 * Represents a link to an article or web page.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inlinequeryresultarticle
 */
class InlineQueryResultArticle implements FromArrayInterface, ToArrayInterface
{
    private ?InlineKeyboardMarkup $replyMarkup = null;

    private ?string $url = null;

    private ?bool $hideUrl = null;

    private ?string $description = null;

    private ?string $thumbUrl = null;

    private ?int $thumbWidth = null;

    private ?int $thumbHeight = null;

    private function __construct(
        private string $type,
        private string $id,
        private string $title,
        private InputMessageContent $inputMessageContent
    ) {
    }

    /**
     * @param string $type Type of the result, must be *article*
     * @param string $id Unique identifier for this result, 1-64 Bytes
     * @param string $title Title of the result
     * @param InputMessageContent $inputMessageContent Content of the message to be sent
     */
    public static function new(string $type, string $id, string $title, InputMessageContent $inputMessageContent): self
    {
        return new self($type, $id, $title, $inputMessageContent);
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
     * URL of the result
     */
    public function url(?string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Pass *True* if you don't want the URL to be shown in the message
     */
    public function hideUrl(?bool $hideUrl): self
    {
        $this->hideUrl = $hideUrl;
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
     * Type of the result, must be *article*
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
     * Title of the result
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Content of the message to be sent
     */
    public function getInputMessageContent(): ?InputMessageContent
    {
        return $this->inputMessageContent;
    }

    /**
     * [Inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) attached to the message
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->replyMarkup;
    }

    /**
     * URL of the result
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Pass *True* if you don't want the URL to be shown in the message
     */
    public function getHideUrl(): ?bool
    {
        return $this->hideUrl;
    }

    /**
     * Short description of the result
     */
    public function getDescription(): ?string
    {
        return $this->description;
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
            $array['title'],
            InputMessageContent::fromArray($array['input_message_content']),
        );

        $instance->replyMarkup = InlineKeyboardMarkup::fromArray($array['reply_markup'] ?? null);
        $instance->url = $array['url'] ?? null;
        $instance->hideUrl = $array['hide_url'] ?? null;
        $instance->description = $array['description'] ?? null;
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
            'title' => $this->title,
            'input_message_content' => $this->inputMessageContent,
            'reply_markup' => $this->replyMarkup,
            'url' => $this->url,
            'hide_url' => $this->hideUrl,
            'description' => $this->description,
            'thumb_url' => $this->thumbUrl,
            'thumb_width' => $this->thumbWidth,
            'thumb_height' => $this->thumbHeight,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
