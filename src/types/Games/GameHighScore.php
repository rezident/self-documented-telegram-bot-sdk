<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Games;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\User;

/**
 * This object represents one row of the high scores table for a game.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#gamehighscore
 */
class GameHighScore implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private int $position, private User $user, private int $score)
    {
    }

    /**
     * @param int $position Position in high score table for the game
     * @param User $user User
     * @param int $score Score
     */
    public static function new(int $position, User $user, int $score): self
    {
        return new self($position, $user, $score);
    }

    /**
     * Position in high score table for the game
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * User
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * Score
     */
    public function getScore(): ?int
    {
        return $this->score;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['position'], User::fromArray($array['user']), $array['score']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'position' => $this->position,
            'user' => $this->user,
            'score' => $this->score,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
