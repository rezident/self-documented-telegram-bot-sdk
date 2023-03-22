<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfMessageEntity;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\MediaGroupInterface;

/**
 * Represents a photo to be sent.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inputmediaphoto
 */
class InputMediaPhoto extends InputMedia implements FromArrayInterface, ToArrayInterface, MediaGroupInterface
{
    private ?string $caption = null;

    private ?string $parseMode = null;

    private ?ArrayOfMessageEntity $captionEntities = null;

    private ?bool $hasSpoiler = null;

    private function __construct(private string $type, private string $media)
    {
    }

    /**
     * @param string $type Type of the result, must be *photo*
     * @param string $media File to send. Pass a file\_id to send a file that exists on the Telegram servers
     *                      (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass
     *                      “attach://&lt;file\_attach\_name&gt;” to upload a new one using multipart/form-data under
     *                      &lt;file\_attach\_name&gt; name.
     *                      [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files)
     */
    public static function new(string $type, string $media): self
    {
        return new self($type, $media);
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
     * Pass *True* if the photo needs to be covered with a spoiler animation
     */
    public function hasSpoiler(?bool $hasSpoiler): self
    {
        $this->hasSpoiler = $hasSpoiler;
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
     * File to send. Pass a file\_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL
     * for Telegram to get a file from the Internet, or pass “attach://&lt;file\_attach\_name&gt;” to upload a new one
     * using multipart/form-data under &lt;file\_attach\_name&gt; name.
     * [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files)
     */
    public function getMedia(): ?string
    {
        return $this->media;
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
     * Pass *True* if the photo needs to be covered with a spoiler animation
     */
    public function getHasSpoiler(): ?bool
    {
        return $this->hasSpoiler;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['type'], $array['media']);

        $instance->caption = $array['caption'] ?? null;
        $instance->parseMode = $array['parse_mode'] ?? null;
        $instance->captionEntities = ArrayOfMessageEntity::fromArray($array['caption_entities'] ?? null);
        $instance->hasSpoiler = $array['has_spoiler'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'type' => $this->type,
            'media' => $this->media,
            'caption' => $this->caption,
            'parse_mode' => $this->parseMode,
            'caption_entities' => $this->captionEntities,
            'has_spoiler' => $this->hasSpoiler,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
