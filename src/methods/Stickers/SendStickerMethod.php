<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ReplyMarkup;
use Rezident\SelfDocumentedTelegramBotSdk\types\InputFile;
use Rezident\SelfDocumentedTelegramBotSdk\types\Message;

/**
 * Use this method to send static .WEBP, [animated](https://telegram.org/blog/animated-stickers) .TGS, or
 * [video](https://telegram.org/blog/video-stickers-better-reactions) .WEBM stickers. On success, the sent
 * [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#sendsticker
 */
class SendStickerMethod implements ToArrayInterface
{
    private ?int $messageThreadId = null;

    private ?string $emoji = null;

    private ?bool $disableNotification = null;

    private ?bool $protectContent = null;

    private ?int $replyToMessageId = null;

    private ?bool $allowSendingWithoutReply = null;

    private ?ReplyMarkup $replyMarkup = null;

    private function __construct(private int|string $chatId, private InputFile|string $sticker)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     *                           `@channelusername`)
     * @param InputFile|string $sticker Sticker to send. Pass a file\_id as String to send a file that exists on the
     *                                  Telegram servers (recommended), pass an HTTP URL as a String for Telegram to
     *                                  get a .WEBP sticker from the Internet, or upload a new .WEBP or .TGS sticker
     *                                  using multipart/form-data.
     *                                  [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files).
     *                                  Video stickers can only be sent by a file\_id. Animated stickers can't be sent
     *                                  via an HTTP URL.
     */
    public static function new(int|string $chatId, InputFile|string $sticker): self
    {
        return new self($chatId, $sticker);
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
     * Emoji associated with the sticker; only for just uploaded stickers
     */
    public function emoji(?string $emoji): self
    {
        $this->emoji = $emoji;
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
            'sticker' => $this->sticker,
            'emoji' => $this->emoji,
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
