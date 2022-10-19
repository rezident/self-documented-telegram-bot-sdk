<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfMessageEntity;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ReplyMarkup;
use Rezident\SelfDocumentedTelegramBotSdk\types\InputFile;
use Rezident\SelfDocumentedTelegramBotSdk\types\Message;

/**
 * Use this method to send video files, Telegram clients support MPEG4 videos (other formats may be sent as
 * [Document](https://core.telegram.org/bots/api#document)). On success, the sent
 * [Message](https://core.telegram.org/bots/api#message) is returned. Bots can currently send video files of up to 50 MB
 * in size, this limit may be changed in the future.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#sendvideo
 */
class SendVideoMethod implements ToArrayInterface
{
    private ?int $duration = null;

    private ?int $width = null;

    private ?int $height = null;

    private InputFile|string|null $thumb = null;

    private ?string $caption = null;

    private ?string $parseMode = null;

    private ?ArrayOfMessageEntity $captionEntities = null;

    private ?bool $supportsStreaming = null;

    private ?bool $disableNotification = null;

    private ?bool $protectContent = null;

    private ?int $replyToMessageId = null;

    private ?bool $allowSendingWithoutReply = null;

    private ?ReplyMarkup $replyMarkup = null;

    private function __construct(private int|string $chatId, private InputFile|string $video)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     *                           `@channelusername`)
     * @param InputFile|string $video Video to send. Pass a file\_id as String to send a video that exists on the
     *                                Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get
     *                                a video from the Internet, or upload a new video using multipart/form-data.
     *                                [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files)
     */
    public static function new(int|string $chatId, InputFile|string $video): self
    {
        return new self($chatId, $video);
    }

    /**
     * Duration of sent video in seconds
     */
    public function duration(?int $duration): self
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * Video width
     */
    public function width(?int $width): self
    {
        $this->width = $width;
        return $this;
    }

    /**
     * Video height
     */
    public function height(?int $height): self
    {
        $this->height = $height;
        return $this;
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
     * Video caption (may also be used when resending videos by *file\_id*), 0-1024 characters after entities parsing
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
     * A JSON-serialized list of special entities that appear in the caption, which can be specified instead of
     * *parse\_mode*
     */
    public function captionEntities(?ArrayOfMessageEntity $captionEntities): self
    {
        $this->captionEntities = $captionEntities;
        return $this;
    }

    /**
     * Pass *True* if the uploaded video is suitable for streaming
     */
    public function supportsStreaming(?bool $supportsStreaming): self
    {
        $this->supportsStreaming = $supportsStreaming;
        return $this;
    }

    /**
     * Sends the message [silently](https://telegram.org/blog/channels-2-0#silent-messages). Users will receive a
     * notification with no sound.
     */
    public function disableNotification(?bool $disableNotification): self
    {
        $this->disableNotification = $disableNotification;
        return $this;
    }

    /**
     * Protects the contents of the sent message from forwarding and saving
     */
    public function protectContent(?bool $protectContent): self
    {
        $this->protectContent = $protectContent;
        return $this;
    }

    /**
     * If the message is a reply, ID of the original message
     */
    public function replyToMessageId(?int $replyToMessageId): self
    {
        $this->replyToMessageId = $replyToMessageId;
        return $this;
    }

    /**
     * Pass *True* if the message should be sent even if the specified replied-to message is not found
     */
    public function allowSendingWithoutReply(?bool $allowSendingWithoutReply): self
    {
        $this->allowSendingWithoutReply = $allowSendingWithoutReply;
        return $this;
    }

    /**
     * Additional interface options. A JSON-serialized object for an
     * [inline keyboard](https://core.telegram.org/bots#inline-keyboards-and-on-the-fly-updating),
     * [custom reply keyboard](https://core.telegram.org/bots#keyboards), instructions to remove reply keyboard or to
     * force a reply from the user.
     */
    public function replyMarkup(?ReplyMarkup $replyMarkup): self
    {
        $this->replyMarkup = $replyMarkup;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'video' => $this->video,
            'duration' => $this->duration,
            'width' => $this->width,
            'height' => $this->height,
            'thumb' => $this->thumb,
            'caption' => $this->caption,
            'parse_mode' => $this->parseMode,
            'caption_entities' => $this->captionEntities,
            'supports_streaming' => $this->supportsStreaming,
            'disable_notification' => $this->disableNotification,
            'protect_content' => $this->protectContent,
            'reply_to_message_id' => $this->replyToMessageId,
            'allow_sending_without_reply' => $this->allowSendingWithoutReply,
            'reply_markup' => $this->replyMarkup,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): Message
    {
        return Message::fromArray($executor->execute($this));
    }
}
