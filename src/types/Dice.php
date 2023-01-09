<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents an animated emoji that displays a random value.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#dice
 */
class Dice implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private string $emoji, private int $value)
    {
    }

    /**
     * @param string $emoji Emoji on which the dice throw animation is based
     * @param int $value Value of the dice, 1-6 for
     *                   “![🎲](https://core.telegram.org//telegram.org/img/emoji/40/F09F8EB2.png)”,
     *                   “![🎯](https://core.telegram.org//telegram.org/img/emoji/40/F09F8EAF.png)” and
     *                   “![🎳](https://core.telegram.org//telegram.org/img/emoji/40/F09F8EB3.png)” base emoji, 1-5 for
     *                   “![🏀](https://core.telegram.org//telegram.org/img/emoji/40/F09F8F80.png)” and
     *                   “![⚽](https://core.telegram.org//telegram.org/img/emoji/40/E29ABD.png)” base emoji, 1-64 for
     *                   “![🎰](https://core.telegram.org//telegram.org/img/emoji/40/F09F8EB0.png)” base emoji
     */
    public static function new(string $emoji, int $value): self
    {
        return new self($emoji, $value);
    }

    /**
     * Emoji on which the dice throw animation is based
     */
    public function getEmoji(): ?string
    {
        return $this->emoji;
    }

    /**
     * Value of the dice, 1-6 for “![🎲](https://core.telegram.org//telegram.org/img/emoji/40/F09F8EB2.png)”,
     * “![🎯](https://core.telegram.org//telegram.org/img/emoji/40/F09F8EAF.png)” and
     * “![🎳](https://core.telegram.org//telegram.org/img/emoji/40/F09F8EB3.png)” base emoji, 1-5 for
     * “![🏀](https://core.telegram.org//telegram.org/img/emoji/40/F09F8F80.png)” and
     * “![⚽](https://core.telegram.org//telegram.org/img/emoji/40/E29ABD.png)” base emoji, 1-64 for
     * “![🎰](https://core.telegram.org//telegram.org/img/emoji/40/F09F8EB0.png)” base emoji
     */
    public function getValue(): ?int
    {
        return $this->value;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['emoji'], $array['value']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'emoji' => $this->emoji,
            'value' => $this->value,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
