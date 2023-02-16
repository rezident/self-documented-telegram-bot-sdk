<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfArrayOfInlineKeyboardButton;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ReplyMarkup;

/**
 * This object represents an [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) that appears
 * right next to the message it belongs to.
 *
 * **Note:** This will only work in Telegram versions released after 9 April, 2016. Older clients will display
 * *unsupported message*.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inlinekeyboardmarkup
 */
class InlineKeyboardMarkup extends ReplyMarkup implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private ArrayOfArrayOfInlineKeyboardButton $inlineKeyboard)
    {
    }

    /**
     * @param ArrayOfArrayOfInlineKeyboardButton $inlineKeyboard Array of button rows, each represented by an Array of
     *                                                           [InlineKeyboardButton](https://core.telegram.org/bots/api#inlinekeyboardbutton)
     *                                                           objects
     */
    public static function new(ArrayOfArrayOfInlineKeyboardButton $inlineKeyboard): self
    {
        return new self($inlineKeyboard);
    }

    /**
     * Array of button rows, each represented by an Array of
     * [InlineKeyboardButton](https://core.telegram.org/bots/api#inlinekeyboardbutton) objects
     */
    public function getInlineKeyboard(): ?ArrayOfArrayOfInlineKeyboardButton
    {
        return $this->inlineKeyboard;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self(ArrayOfArrayOfInlineKeyboardButton::fromArray($array['inline_keyboard']));

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'inline_keyboard' => $this->inlineKeyboard,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
