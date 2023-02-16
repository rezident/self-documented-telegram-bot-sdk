<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Games\CallbackGame;

/**
 * This object represents one button of an inline keyboard. You **must** use exactly one of the optional fields.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inlinekeyboardbutton
 */
class InlineKeyboardButton implements FromArrayInterface, ToArrayInterface
{
    private ?string $url = null;

    private ?string $callbackData = null;

    private ?WebAppInfo $webApp = null;

    private ?LoginUrl $loginUrl = null;

    private ?string $switchInlineQuery = null;

    private ?string $switchInlineQueryCurrentChat = null;

    private ?CallbackGame $callbackGame = null;

    private ?bool $pay = null;

    private function __construct(private string $text)
    {
    }

    /**
     * @param string $text Label text on the button
     */
    public static function new(string $text): self
    {
        return new self($text);
    }

    /**
     * HTTP or tg:// URL to be opened when the button is pressed. Links `tg://user?id=<user_id>` can be used to mention
     * a user by their ID without using a username, if this is allowed by their privacy settings.
     */
    public function url(?string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Data to be sent in a [callback query](https://core.telegram.org/bots/api#callbackquery) to the bot when button
     * is pressed, 1-64 bytes
     */
    public function callbackData(?string $callbackData): self
    {
        $this->callbackData = $callbackData;
        return $this;
    }

    /**
     * Description of the [Web App](https://core.telegram.org/bots/webapps) that will be launched when the user presses
     * the button. The Web App will be able to send an arbitrary message on behalf of the user using the method
     * [answerWebAppQuery](https://core.telegram.org/bots/api#answerwebappquery). Available only in private chats
     * between a user and the bot.
     */
    public function webApp(?WebAppInfo $webApp): self
    {
        $this->webApp = $webApp;
        return $this;
    }

    /**
     * An HTTPS URL used to automatically authorize the user. Can be used as a replacement for the
     * [Telegram Login Widget](https://core.telegram.org/widgets/login).
     */
    public function loginUrl(?LoginUrl $loginUrl): self
    {
        $this->loginUrl = $loginUrl;
        return $this;
    }

    /**
     * If set, pressing the button will prompt the user to select one of their chats, open that chat and insert the
     * bot's username and the specified inline query in the input field. May be empty, in which case just the bot's
     * username will be inserted.
     *
     * **Note:** This offers an easy way for users to start using your bot in
     * [inline mode](https://core.telegram.org/bots/inline) when they are currently in a private chat with it.
     * Especially useful when combined with [*switch\_pm…*](https://core.telegram.org/bots/api#answerinlinequery)
     * actions - in this case the user will be automatically returned to the chat they switched from, skipping the chat
     * selection screen.
     */
    public function switchInlineQuery(?string $switchInlineQuery): self
    {
        $this->switchInlineQuery = $switchInlineQuery;
        return $this;
    }

    /**
     * If set, pressing the button will insert the bot's username and the specified inline query in the current chat's
     * input field. May be empty, in which case only the bot's username will be inserted.
     *
     * This offers a quick way for the user to open your bot in inline mode in the same chat - good for selecting
     * something from multiple options.
     */
    public function switchInlineQueryCurrentChat(?string $switchInlineQueryCurrentChat): self
    {
        $this->switchInlineQueryCurrentChat = $switchInlineQueryCurrentChat;
        return $this;
    }

    /**
     * Description of the game that will be launched when the user presses the button.
     *
     * **NOTE:** This type of button **must** always be the first button in the first row.
     */
    public function callbackGame(?CallbackGame $callbackGame): self
    {
        $this->callbackGame = $callbackGame;
        return $this;
    }

    /**
     * Specify *True*, to send a [Pay button](https://core.telegram.org/bots/api#payments).
     *
     * **NOTE:** This type of button **must** always be the first button in the first row and can only be used in
     * invoice messages.
     */
    public function pay(?bool $pay): self
    {
        $this->pay = $pay;
        return $this;
    }

    /**
     * Label text on the button
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * HTTP or tg:// URL to be opened when the button is pressed. Links `tg://user?id=<user_id>` can be used to mention
     * a user by their ID without using a username, if this is allowed by their privacy settings.
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Data to be sent in a [callback query](https://core.telegram.org/bots/api#callbackquery) to the bot when button
     * is pressed, 1-64 bytes
     */
    public function getCallbackData(): ?string
    {
        return $this->callbackData;
    }

    /**
     * Description of the [Web App](https://core.telegram.org/bots/webapps) that will be launched when the user presses
     * the button. The Web App will be able to send an arbitrary message on behalf of the user using the method
     * [answerWebAppQuery](https://core.telegram.org/bots/api#answerwebappquery). Available only in private chats
     * between a user and the bot.
     */
    public function getWebApp(): ?WebAppInfo
    {
        return $this->webApp;
    }

    /**
     * An HTTPS URL used to automatically authorize the user. Can be used as a replacement for the
     * [Telegram Login Widget](https://core.telegram.org/widgets/login).
     */
    public function getLoginUrl(): ?LoginUrl
    {
        return $this->loginUrl;
    }

    /**
     * If set, pressing the button will prompt the user to select one of their chats, open that chat and insert the
     * bot's username and the specified inline query in the input field. May be empty, in which case just the bot's
     * username will be inserted.
     *
     * **Note:** This offers an easy way for users to start using your bot in
     * [inline mode](https://core.telegram.org/bots/inline) when they are currently in a private chat with it.
     * Especially useful when combined with [*switch\_pm…*](https://core.telegram.org/bots/api#answerinlinequery)
     * actions - in this case the user will be automatically returned to the chat they switched from, skipping the chat
     * selection screen.
     */
    public function getSwitchInlineQuery(): ?string
    {
        return $this->switchInlineQuery;
    }

    /**
     * If set, pressing the button will insert the bot's username and the specified inline query in the current chat's
     * input field. May be empty, in which case only the bot's username will be inserted.
     *
     * This offers a quick way for the user to open your bot in inline mode in the same chat - good for selecting
     * something from multiple options.
     */
    public function getSwitchInlineQueryCurrentChat(): ?string
    {
        return $this->switchInlineQueryCurrentChat;
    }

    /**
     * Description of the game that will be launched when the user presses the button.
     *
     * **NOTE:** This type of button **must** always be the first button in the first row.
     */
    public function getCallbackGame(): ?CallbackGame
    {
        return $this->callbackGame;
    }

    /**
     * Specify *True*, to send a [Pay button](https://core.telegram.org/bots/api#payments).
     *
     * **NOTE:** This type of button **must** always be the first button in the first row and can only be used in
     * invoice messages.
     */
    public function getPay(): ?bool
    {
        return $this->pay;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['text']);

        $instance->url = $array['url'] ?? null;
        $instance->callbackData = $array['callback_data'] ?? null;
        $instance->webApp = WebAppInfo::fromArray($array['web_app'] ?? null);
        $instance->loginUrl = LoginUrl::fromArray($array['login_url'] ?? null);
        $instance->switchInlineQuery = $array['switch_inline_query'] ?? null;
        $instance->switchInlineQueryCurrentChat = $array['switch_inline_query_current_chat'] ?? null;
        $instance->callbackGame = CallbackGame::fromArray($array['callback_game'] ?? null);
        $instance->pay = $array['pay'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'text' => $this->text,
            'url' => $this->url,
            'callback_data' => $this->callbackData,
            'web_app' => $this->webApp,
            'login_url' => $this->loginUrl,
            'switch_inline_query' => $this->switchInlineQuery,
            'switch_inline_query_current_chat' => $this->switchInlineQueryCurrentChat,
            'callback_game' => $this->callbackGame,
            'pay' => $this->pay,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
