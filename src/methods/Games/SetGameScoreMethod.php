<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Games;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Message;

/**
 * Use this method to set the score of the specified user in a game message. On success, if the message is not an inline
 * message, the [Message](https://core.telegram.org/bots/api#message) is returned, otherwise *True* is returned. Returns
 * an error, if the new score is not greater than the user's current score in the chat and *force* is *False*.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setgamescore
 */
class SetGameScoreMethod implements ToArrayInterface
{
    private ?bool $force = null;

    private ?bool $disableEditMessage = null;

    private ?int $chatId = null;

    private ?int $messageId = null;

    private ?string $inlineMessageId = null;

    private function __construct(private int $userId, private int $score)
    {
    }

    /**
     * @param int $userId User identifier
     * @param int $score New score, must be non-negative
     */
    public static function new(int $userId, int $score): self
    {
        return new self($userId, $score);
    }

    /**
     * Pass *True* if the high score is allowed to decrease. This can be useful when fixing mistakes or banning
     * cheaters
     */
    public function force(?bool $force): self
    {
        $this->force = $force;
        return $this;
    }

    /**
     * Pass *True* if the game message should not be automatically edited to include the current scoreboard
     */
    public function disableEditMessage(?bool $disableEditMessage): self
    {
        $this->disableEditMessage = $disableEditMessage;
        return $this;
    }

    /**
     * Required if *inline\_message\_id* is not specified. Unique identifier for the target chat
     */
    public function chatId(?int $chatId): self
    {
        $this->chatId = $chatId;
        return $this;
    }

    /**
     * Required if *inline\_message\_id* is not specified. Identifier of the sent message
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

    public function toArray(): array
    {
        $data = [
            'user_id' => $this->userId,
            'score' => $this->score,
            'force' => $this->force,
            'disable_edit_message' => $this->disableEditMessage,
            'chat_id' => $this->chatId,
            'message_id' => $this->messageId,
            'inline_message_id' => $this->inlineMessageId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): Message|bool
    {
        $result = $executor->execute($this);
        return is_array($result) ? Message::fromArray($result) : $result;
    }
}
