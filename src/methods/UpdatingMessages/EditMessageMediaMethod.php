<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\UpdatingMessages;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineKeyboardMarkup;
use Rezident\SelfDocumentedTelegramBotSdk\types\InputMedia;
use Rezident\SelfDocumentedTelegramBotSdk\types\Message;

/**
 * Use this method to edit animation, audio, document, photo, or video messages. If a message is part of a message
 * album, then it can be edited only to an audio for audio albums, only to a document for document albums and to a photo
 * or a video otherwise. When an inline message is edited, a new file can't be uploaded; use a previously uploaded file
 * via its file\_id or specify a URL. On success, if the edited message is not an inline message, the edited
 * [Message](https://core.telegram.org/bots/api#message) is returned, otherwise *True* is returned.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#editmessagemedia
 */
class EditMessageMediaMethod implements ToArrayInterface
{
    private int|string|null $chatId = null;

    private ?int $messageId = null;

    private ?string $inlineMessageId = null;

    private ?InlineKeyboardMarkup $replyMarkup = null;

    private function __construct(private InputMedia $media)
    {
    }

    /**
     * @param InputMedia $media A JSON-serialized object for a new media content of the message
     */
    public static function new(InputMedia $media): self
    {
        return new self($media);
    }

    /**
     * Required if *inline\_message\_id* is not specified. Unique identifier for the target chat or username of the
     * target channel (in the format `@channelusername`)
     */
    public function chatId(int|string|null $chatId): self
    {
        $this->chatId = $chatId;
        return $this;
    }

    /**
     * Required if *inline\_message\_id* is not specified. Identifier of the message to edit
     */
    public function messageId(?int $messageId): self
    {
        $this->messageId = $messageId;
        return $this;
    }

    /**
     * Required if *chat\_id* and *message\_id* are not specified. Identifier of the inline message
     */
    public function inlineMessageId(?string $inlineMessageId): self
    {
        $this->inlineMessageId = $inlineMessageId;
        return $this;
    }

    /**
     * A JSON-serialized object for a new [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards).
     */
    public function replyMarkup(?InlineKeyboardMarkup $replyMarkup): self
    {
        $this->replyMarkup = $replyMarkup;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'message_id' => $this->messageId,
            'inline_message_id' => $this->inlineMessageId,
            'media' => $this->media,
            'reply_markup' => $this->replyMarkup,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): Message|bool
    {
        $result = $executor->execute($this);
        return is_array($result) ? Message::fromArray($result) : $result;
    }
}
