<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to send answers to callback queries sent from
 * [inline keyboards](https://core.telegram.org/bots/features#inline-keyboards). The answer will be displayed to the
 * user as a notification at the top of the chat screen or as an alert. On success, *True* is returned.
 *
 * > Alternatively, the user can be redirected to the specified Game URL. For this option to work, you must first create
 * a game for your bot via [@BotFather](https://t.me/botfather) and accept the terms. Otherwise, you may use links like
 * `t.me/your_bot?start=XXXX` that open your bot with a parameter.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#answercallbackquery
 */
class AnswerCallbackQueryMethod implements ToArrayInterface
{
    private ?string $text = null;

    private ?bool $showAlert = null;

    private ?string $url = null;

    private ?int $cacheTime = null;

    private function __construct(private string $callbackQueryId)
    {
    }

    /**
     * @param string $callbackQueryId Unique identifier for the query to be answered
     */
    public static function new(string $callbackQueryId): self
    {
        return new self($callbackQueryId);
    }

    /**
     * Text of the notification. If not specified, nothing will be shown to the user, 0-200 characters
     */
    public function text(?string $text): self
    {
        $this->text = $text;
        return $this;
    }

    /**
     * If *True*, an alert will be shown by the client instead of a notification at the top of the chat screen.
     * Defaults to *false*.
     */
    public function showAlert(?bool $showAlert): self
    {
        $this->showAlert = $showAlert;
        return $this;
    }

    /**
     * URL that will be opened by the user's client. If you have created a
     * [Game](https://core.telegram.org/bots/api#game) and accepted the conditions via
     * [@BotFather](https://t.me/botfather), specify the URL that opens your game - note that this will only work if
     * the query comes from a [*callback\_game*](https://core.telegram.org/bots/api#inlinekeyboardbutton) button.
     *
     * Otherwise, you may use links like `t.me/your_bot?start=XXXX` that open your bot with a parameter.
     */
    public function url(?string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * The maximum amount of time in seconds that the result of the callback query may be cached client-side. Telegram
     * apps will support caching starting in version 3.14. Defaults to 0.
     */
    public function cacheTime(?int $cacheTime): self
    {
        $this->cacheTime = $cacheTime;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'callback_query_id' => $this->callbackQueryId,
            'text' => $this->text,
            'show_alert' => $this->showAlert,
            'url' => $this->url,
            'cache_time' => $this->cacheTime,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
