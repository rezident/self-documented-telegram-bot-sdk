<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineKeyboardMarkup;

/**
 * Represents a [Game](https://core.telegram.org/bots/api#games).
 *
 * **Note:** This will only work in Telegram versions released after October 1, 2016. Older clients will not display any
 * inline results if a game result is among them.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inlinequeryresultgame
 */
class InlineQueryResultGame implements FromArrayInterface, ToArrayInterface
{
    private ?InlineKeyboardMarkup $replyMarkup = null;

    private function __construct(private string $type, private string $id, private string $gameShortName)
    {
    }

    /**
     * @param string $type Type of the result, must be *game*
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $gameShortName Short name of the game
     */
    public static function new(string $type, string $id, string $gameShortName): self
    {
        return new self($type, $id, $gameShortName);
    }

    /**
     * [Inline keyboard](https://core.telegram.org/bots#inline-keyboards-and-on-the-fly-updating) attached to the
     * message
     */
    public function replyMarkup(?InlineKeyboardMarkup $replyMarkup): self
    {
        $this->replyMarkup = $replyMarkup;
        return $this;
    }

    /**
     * Type of the result, must be *game*
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Unique identifier for this result, 1-64 bytes
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Short name of the game
     */
    public function getGameShortName(): ?string
    {
        return $this->gameShortName;
    }

    /**
     * [Inline keyboard](https://core.telegram.org/bots#inline-keyboards-and-on-the-fly-updating) attached to the
     * message
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->replyMarkup;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['type'], $array['id'], $array['game_short_name']);

        $instance->replyMarkup = InlineKeyboardMarkup::fromArray($array['reply_markup'] ?? null);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'type' => $this->type,
            'id' => $this->id,
            'game_short_name' => $this->gameShortName,
            'reply_markup' => $this->replyMarkup,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
