<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfMessageEntity;

/**
 * Represents the [content](https://core.telegram.org/bots/api#inputmessagecontent) of a text message to be sent as the
 * result of an inline query.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inputtextmessagecontent
 */
class InputTextMessageContent implements FromArrayInterface, ToArrayInterface
{
    private ?string $parseMode = null;

    private ?ArrayOfMessageEntity $entities = null;

    private ?bool $disableWebPagePreview = null;

    private function __construct(private string $messageText)
    {
    }

    /**
     * @param string $messageText Text of the message to be sent, 1-4096 characters
     */
    public static function new(string $messageText): self
    {
        return new self($messageText);
    }

    /**
     * Mode for parsing entities in the message text. See
     * [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details.
     */
    public function parseMode(?string $parseMode): self
    {
        $this->parseMode = $parseMode;
        return $this;
    }

    /**
     * List of special entities that appear in message text, which can be specified instead of *parse\_mode*
     */
    public function entities(?ArrayOfMessageEntity $entities): self
    {
        $this->entities = $entities;
        return $this;
    }

    /**
     * Disables link previews for links in the sent message
     */
    public function disableWebPagePreview(?bool $disableWebPagePreview): self
    {
        $this->disableWebPagePreview = $disableWebPagePreview;
        return $this;
    }

    /**
     * Text of the message to be sent, 1-4096 characters
     */
    public function getMessageText(): ?string
    {
        return $this->messageText;
    }

    /**
     * Mode for parsing entities in the message text. See
     * [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details.
     */
    public function getParseMode(): ?string
    {
        return $this->parseMode;
    }

    /**
     * List of special entities that appear in message text, which can be specified instead of *parse\_mode*
     */
    public function getEntities(): ?ArrayOfMessageEntity
    {
        return $this->entities;
    }

    /**
     * Disables link previews for links in the sent message
     */
    public function getDisableWebPagePreview(): ?bool
    {
        return $this->disableWebPagePreview;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['message_text']);

        $instance->parseMode = $array['parse_mode'] ?? null;
        $instance->entities = ArrayOfMessageEntity::fromArray($array['entities'] ?? null);
        $instance->disableWebPagePreview = $array['disable_web_page_preview'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'message_text' => $this->messageText,
            'parse_mode' => $this->parseMode,
            'entities' => $this->entities,
            'disable_web_page_preview' => $this->disableWebPagePreview,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
