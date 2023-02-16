<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\UpdatingMessages;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineKeyboardMarkup;
use Rezident\SelfDocumentedTelegramBotSdk\types\Poll;

/**
 * Use this method to stop a poll which was sent by the bot. On success, the stopped
 * [Poll](https://core.telegram.org/bots/api#poll) is returned.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#stoppoll
 */
class StopPollMethod implements ToArrayInterface
{
    private ?InlineKeyboardMarkup $replyMarkup = null;

    private function __construct(private int|string $chatId, private int $messageId)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     *                           `@channelusername`)
     * @param int $messageId Identifier of the original message with the poll
     */
    public static function new(int|string $chatId, int $messageId): self
    {
        return new self($chatId, $messageId);
    }

    /**
     * A JSON-serialized object for a new message
     * [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards).
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
            'reply_markup' => $this->replyMarkup,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): Poll
    {
        return Poll::fromArray($executor->execute($this));
    }
}
