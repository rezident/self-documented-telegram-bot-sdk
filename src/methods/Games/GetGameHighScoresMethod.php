<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Games;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfGameHighScore;

/**
 * Use this method to get data for high score tables. Will return the score of the specified user and several of their
 * neighbors in a game. Returns an Array of [GameHighScore](https://core.telegram.org/bots/api#gamehighscore) objects.
 *
 * > This method will currently return scores for the target user, plus two of their closest neighbors on each side.
 * Will also return the top three users if the user and their neighbors are not among them. Please note that this
 * behavior is subject to change.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#getgamehighscores
 */
class GetGameHighScoresMethod implements ToArrayInterface
{
    private ?int $chatId = null;

    private ?int $messageId = null;

    private ?string $inlineMessageId = null;

    private function __construct(private int $userId)
    {
    }

    /**
     * @param int $userId Target user id
     */
    public static function new(int $userId): self
    {
        return new self($userId);
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
            'chat_id' => $this->chatId,
            'message_id' => $this->messageId,
            'inline_message_id' => $this->inlineMessageId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): ArrayOfGameHighScore
    {
        return ArrayOfGameHighScore::fromArray($executor->execute($this));
    }
}
