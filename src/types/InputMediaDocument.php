<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfMessageEntity;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\MediaGroupInterface;

/**
 * Represents a general file to be sent.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inputmediadocument
 */
class InputMediaDocument extends InputMedia implements FromArrayInterface, ToArrayInterface, MediaGroupInterface
{
    private InputFile|string|null $thumb = null;

    private ?string $caption = null;

    private ?string $parseMode = null;

    private ?ArrayOfMessageEntity $captionEntities = null;

    private ?bool $disableContentTypeDetection = null;

    private function __construct(private string $type, private string $media)
    {
    }

    /**
     * @param string $type Type of the result, must be *document*
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
     * Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The
     * thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not
     * exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be
     * only uploaded as a new file, so you can pass “attach://&lt;file\_attach\_name&gt;” if the thumbnail was uploaded
     * using multipart/form-data under &lt;file\_attach\_name&gt;.
     * [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files)
     */
    public function thumb(InputFile|string|null $thumb): self
    {
        $this->thumb = $thumb;
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
     * Disables automatic server-side content type detection for files uploaded using multipart/form-data. Always
     * *True*, if the document is sent as part of an album.
     */
    public function disableContentTypeDetection(?bool $disableContentTypeDetection): self
    {
        $this->disableContentTypeDetection = $disableContentTypeDetection;
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
     * Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The
     * thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not
     * exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be
     * only uploaded as a new file, so you can pass “attach://&lt;file\_attach\_name&gt;” if the thumbnail was uploaded
     * using multipart/form-data under &lt;file\_attach\_name&gt;.
     * [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files)
     */
    public function getThumb(): InputFile|string|null
    {
        return $this->thumb;
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
     * Disables automatic server-side content type detection for files uploaded using multipart/form-data. Always
     * *True*, if the document is sent as part of an album.
     */
    public function getDisableContentTypeDetection(): ?bool
    {
        return $this->disableContentTypeDetection;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['type'], $array['media']);

        $instance->thumb = $array['thumb'] ?? null;
        $instance->caption = $array['caption'] ?? null;
        $instance->parseMode = $array['parse_mode'] ?? null;
        $instance->captionEntities = ArrayOfMessageEntity::fromArray($array['caption_entities'] ?? null);
        $instance->disableContentTypeDetection = $array['disable_content_type_detection'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'type' => $this->type,
            'media' => $this->media,
            'thumb' => $this->thumb,
            'caption' => $this->caption,
            'parse_mode' => $this->parseMode,
            'caption_entities' => $this->captionEntities,
            'disable_content_type_detection' => $this->disableContentTypeDetection,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
