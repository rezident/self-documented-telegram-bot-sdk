<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ReplyMarkup;

/**
 * Upon receiving a message with this object, Telegram clients will remove the current custom keyboard and display the
 * default letter-keyboard. By default, custom keyboards are displayed until a new keyboard is sent by a bot. An
 * exception is made for one-time keyboards that are hidden immediately after the user presses a button (see
 * [ReplyKeyboardMarkup](https://core.telegram.org/bots/api#replykeyboardmarkup)).
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#replykeyboardremove
 */
class ReplyKeyboardRemove extends ReplyMarkup implements FromArrayInterface, ToArrayInterface
{
    private ?bool $selective = null;

    private function __construct(private bool $removeKeyboard)
    {
    }

    /**
     * @param bool $removeKeyboard Requests clients to remove the custom keyboard (user will not be able to summon this
     *                             keyboard; if you want to hide the keyboard from sight but keep it accessible, use
     *                             *one\_time\_keyboard* in
     *                             [ReplyKeyboardMarkup](https://core.telegram.org/bots/api#replykeyboardmarkup))
     */
    public static function new(bool $removeKeyboard): self
    {
        return new self($removeKeyboard);
    }

    /**
     * Use this parameter if you want to remove the keyboard for specific users only. Targets: 1) users that are
     * @mentioned in the *text* of the [Message](https://core.telegram.org/bots/api#message) object; 2) if the bot's
     * message is a reply (has *reply\_to\_message\_id*), sender of the original message.
     *
     * *Example:* A user votes in a poll, bot returns confirmation message in reply to the vote and removes the
     * keyboard for that user, while still showing the keyboard with poll options to users who haven't voted yet.
     */
    public function selective(?bool $selective): self
    {
        $this->selective = $selective;
        return $this;
    }

    /**
     * Requests clients to remove the custom keyboard (user will not be able to summon this keyboard; if you want to
     * hide the keyboard from sight but keep it accessible, use *one\_time\_keyboard* in
     * [ReplyKeyboardMarkup](https://core.telegram.org/bots/api#replykeyboardmarkup))
     */
    public function getRemoveKeyboard(): ?bool
    {
        return $this->removeKeyboard;
    }

    /**
     * Use this parameter if you want to remove the keyboard for specific users only. Targets: 1) users that are
     * @mentioned in the *text* of the [Message](https://core.telegram.org/bots/api#message) object; 2) if the bot's
     * message is a reply (has *reply\_to\_message\_id*), sender of the original message.
     *
     * *Example:* A user votes in a poll, bot returns confirmation message in reply to the vote and removes the
     * keyboard for that user, while still showing the keyboard with poll options to users who haven't voted yet.
     */
    public function getSelective(): ?bool
    {
        return $this->selective;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['remove_keyboard']);

        $instance->selective = $array['selective'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'remove_keyboard' => $this->removeKeyboard,
            'selective' => $this->selective,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
