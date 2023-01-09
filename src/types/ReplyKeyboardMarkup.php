<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfArrayOfKeyboardButton;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ReplyMarkup;

/**
 * This object represents a [custom keyboard](https://core.telegram.org/bots/features#keyboards) with reply options (see
 * [Introduction to bots](https://core.telegram.org/bots/features#keyboards) for details and examples).
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#replykeyboardmarkup
 */
class ReplyKeyboardMarkup extends ReplyMarkup implements FromArrayInterface, ToArrayInterface
{
    private ?bool $isPersistent = null;

    private ?bool $resizeKeyboard = null;

    private ?bool $oneTimeKeyboard = null;

    private ?string $inputFieldPlaceholder = null;

    private ?bool $selective = null;

    private function __construct(private ArrayOfArrayOfKeyboardButton $keyboard)
    {
    }

    /**
     * @param ArrayOfArrayOfKeyboardButton $keyboard Array of button rows, each represented by an Array of
     *                                               [KeyboardButton](https://core.telegram.org/bots/api#keyboardbutton)
     *                                               objects
     */
    public static function new(ArrayOfArrayOfKeyboardButton $keyboard): self
    {
        return new self($keyboard);
    }

    /**
     * Requests clients to always show the keyboard when the regular keyboard is hidden. Defaults to *false*, in which
     * case the custom keyboard can be hidden and opened with a keyboard icon.
     */
    public function isPersistent(?bool $isPersistent): self
    {
        $this->isPersistent = $isPersistent;
        return $this;
    }

    /**
     * Requests clients to resize the keyboard vertically for optimal fit (e.g., make the keyboard smaller if there are
     * just two rows of buttons). Defaults to *false*, in which case the custom keyboard is always of the same height
     * as the app's standard keyboard.
     */
    public function resizeKeyboard(?bool $resizeKeyboard): self
    {
        $this->resizeKeyboard = $resizeKeyboard;
        return $this;
    }

    /**
     * Requests clients to hide the keyboard as soon as it's been used. The keyboard will still be available, but
     * clients will automatically display the usual letter-keyboard in the chat - the user can press a special button
     * in the input field to see the custom keyboard again. Defaults to *false*.
     */
    public function oneTimeKeyboard(?bool $oneTimeKeyboard): self
    {
        $this->oneTimeKeyboard = $oneTimeKeyboard;
        return $this;
    }

    /**
     * The placeholder to be shown in the input field when the keyboard is active; 1-64 characters
     */
    public function inputFieldPlaceholder(?string $inputFieldPlaceholder): self
    {
        $this->inputFieldPlaceholder = $inputFieldPlaceholder;
        return $this;
    }

    /**
     * Use this parameter if you want to show the keyboard to specific users only. Targets: 1) users that are
     * @mentioned in the *text* of the [Message](https://core.telegram.org/bots/api#message) object; 2) if the bot's
     * message is a reply (has *reply\_to\_message\_id*), sender of the original message.
     *
     * *Example:* A user requests to change the bot's language, bot replies to the request with a keyboard to select
     * the new language. Other users in the group don't see the keyboard.
     */
    public function selective(?bool $selective): self
    {
        $this->selective = $selective;
        return $this;
    }

    /**
     * Array of button rows, each represented by an Array of
     * [KeyboardButton](https://core.telegram.org/bots/api#keyboardbutton) objects
     */
    public function getKeyboard(): ?ArrayOfArrayOfKeyboardButton
    {
        return $this->keyboard;
    }

    /**
     * Requests clients to always show the keyboard when the regular keyboard is hidden. Defaults to *false*, in which
     * case the custom keyboard can be hidden and opened with a keyboard icon.
     */
    public function getIsPersistent(): ?bool
    {
        return $this->isPersistent;
    }

    /**
     * Requests clients to resize the keyboard vertically for optimal fit (e.g., make the keyboard smaller if there are
     * just two rows of buttons). Defaults to *false*, in which case the custom keyboard is always of the same height
     * as the app's standard keyboard.
     */
    public function getResizeKeyboard(): ?bool
    {
        return $this->resizeKeyboard;
    }

    /**
     * Requests clients to hide the keyboard as soon as it's been used. The keyboard will still be available, but
     * clients will automatically display the usual letter-keyboard in the chat - the user can press a special button
     * in the input field to see the custom keyboard again. Defaults to *false*.
     */
    public function getOneTimeKeyboard(): ?bool
    {
        return $this->oneTimeKeyboard;
    }

    /**
     * The placeholder to be shown in the input field when the keyboard is active; 1-64 characters
     */
    public function getInputFieldPlaceholder(): ?string
    {
        return $this->inputFieldPlaceholder;
    }

    /**
     * Use this parameter if you want to show the keyboard to specific users only. Targets: 1) users that are
     * @mentioned in the *text* of the [Message](https://core.telegram.org/bots/api#message) object; 2) if the bot's
     * message is a reply (has *reply\_to\_message\_id*), sender of the original message.
     *
     * *Example:* A user requests to change the bot's language, bot replies to the request with a keyboard to select
     * the new language. Other users in the group don't see the keyboard.
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

        $instance = new self(ArrayOfArrayOfKeyboardButton::fromArray($array['keyboard']));

        $instance->isPersistent = $array['is_persistent'] ?? null;
        $instance->resizeKeyboard = $array['resize_keyboard'] ?? null;
        $instance->oneTimeKeyboard = $array['one_time_keyboard'] ?? null;
        $instance->inputFieldPlaceholder = $array['input_field_placeholder'] ?? null;
        $instance->selective = $array['selective'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'keyboard' => $this->keyboard,
            'is_persistent' => $this->isPersistent,
            'resize_keyboard' => $this->resizeKeyboard,
            'one_time_keyboard' => $this->oneTimeKeyboard,
            'input_field_placeholder' => $this->inputFieldPlaceholder,
            'selective' => $this->selective,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
