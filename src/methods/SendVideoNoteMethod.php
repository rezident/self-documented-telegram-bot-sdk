<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ReplyMarkup;
use Rezident\SelfDocumentedTelegramBotSdk\types\InputFile;
use Rezident\SelfDocumentedTelegramBotSdk\types\Message;

/**
 * As of [v.4.0](https://telegram.org/blog/video-messages-and-telescope), Telegram clients support rounded square MPEG4
 * videos of up to 1 minute long. Use this method to send video messages. On success, the sent
 * [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#sendvideonote
 */
class SendVideoNoteMethod implements ToArrayInterface
{
    private ?int $messageThreadId = null;

    private ?int $duration = null;

    private ?int $length = null;

    private InputFile|string|null $thumb = null;

    private ?bool $disableNotification = null;

    private ?bool $protectContent = null;

    private ?int $replyToMessageId = null;

    private ?bool $allowSendingWithoutReply = null;

    private ?ReplyMarkup $replyMarkup = null;

    private function __construct(private int|string $chatId, private InputFile|string $videoNote)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     *                           `@channelusername`)
     * @param InputFile|string $videoNote Video note to send. Pass a file\_id as String to send a video note that
     *                                    exists on the Telegram servers (recommended) or upload a new video using
     *                                    multipart/form-data.
     *                                    [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files).
     *                                    Sending video notes by a URL is currently unsupported
     */
    public static function new(int|string $chatId, InputFile|string $videoNote): self
    {
        return new self($chatId, $videoNote);
    }

    /**
     * Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     */
    public function messageThreadId(?int $messageThreadId): self
    {
        $this->messageThreadId = $messageThreadId;
        return $this;
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
     * Video width and height, i.e. diameter of the video message
     */
    public function length(?int $length): self
    {
        $this->length = $length;
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
     * [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards),
     * [custom reply keyboard](https://core.telegram.org/bots/features#keyboards), instructions to remove reply
     * keyboard or to force a reply from the user.
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
            'message_thread_id' => $this->messageThreadId,
            'video_note' => $this->videoNote,
            'duration' => $this->duration,
            'length' => $this->length,
            'thumb' => $this->thumb,
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
