<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a parameter of the inline keyboard button used to automatically authorize a user. Serves as a
 * great replacement for the [Telegram Login Widget](https://core.telegram.org/widgets/login) when the user is coming
 * from Telegram. All the user needs to do is tap/click a button and confirm that they want to log in:
 *
 * [![TITLE](https://core.telegram.org/file/811140909/1631/20k1Z53eiyY.23995/c541e89b74253623d9 "TITLE")](https://core.telegram.org/file/811140015/1734/8VZFkwWXalM.97872/6127fa62d8a0bf2b3c)
 *
 * Telegram apps support these buttons as of
 * [version 5.7](https://telegram.org/blog/privacy-discussions-web-bots#meet-seamless-web-bots).
 *
 * > Sample bot: [@discussbot](https://t.me/discussbot)
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#loginurl
 */
class LoginUrl implements FromArrayInterface, ToArrayInterface
{
    private ?string $forwardText = null;

    private ?string $botUsername = null;

    private ?bool $requestWriteAccess = null;

    private function __construct(private string $url)
    {
    }

    /**
     * @param string $url An HTTPS URL to be opened with user authorization data added to the query string when the
     *                    button is pressed. If the user refuses to provide authorization data, the original URL
     *                    without information about the user will be opened. The data added is the same as described in
     *                    [Receiving authorization data](https://core.telegram.org/widgets/login#receiving-authorization-data).
     *
     *                    **NOTE:** You **must** always check the hash of the received data to verify the
     *                    authentication and the integrity of the data as described in
     *                    [Checking authorization](https://core.telegram.org/widgets/login#checking-authorization).
     */
    public static function new(string $url): self
    {
        return new self($url);
    }

    /**
     * New text of the button in forwarded messages.
     */
    public function forwardText(?string $forwardText): self
    {
        $this->forwardText = $forwardText;
        return $this;
    }

    /**
     * Username of a bot, which will be used for user authorization. See
     * [Setting up a bot](https://core.telegram.org/widgets/login#setting-up-a-bot) for more details. If not specified,
     * the current bot's username will be assumed. The *url*'s domain must be the same as the domain linked with the
     * bot. See
     * [Linking your domain to the bot](https://core.telegram.org/widgets/login#linking-your-domain-to-the-bot) for
     * more details.
     */
    public function botUsername(?string $botUsername): self
    {
        $this->botUsername = $botUsername;
        return $this;
    }

    /**
     * Pass *True* to request the permission for your bot to send messages to the user.
     */
    public function requestWriteAccess(?bool $requestWriteAccess): self
    {
        $this->requestWriteAccess = $requestWriteAccess;
        return $this;
    }

    /**
     * An HTTPS URL to be opened with user authorization data added to the query string when the button is pressed. If
     * the user refuses to provide authorization data, the original URL without information about the user will be
     * opened. The data added is the same as described in
     * [Receiving authorization data](https://core.telegram.org/widgets/login#receiving-authorization-data).
     *
     * **NOTE:** You **must** always check the hash of the received data to verify the authentication and the integrity
     * of the data as described in
     * [Checking authorization](https://core.telegram.org/widgets/login#checking-authorization).
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * New text of the button in forwarded messages.
     */
    public function getForwardText(): ?string
    {
        return $this->forwardText;
    }

    /**
     * Username of a bot, which will be used for user authorization. See
     * [Setting up a bot](https://core.telegram.org/widgets/login#setting-up-a-bot) for more details. If not specified,
     * the current bot's username will be assumed. The *url*'s domain must be the same as the domain linked with the
     * bot. See
     * [Linking your domain to the bot](https://core.telegram.org/widgets/login#linking-your-domain-to-the-bot) for
     * more details.
     */
    public function getBotUsername(): ?string
    {
        return $this->botUsername;
    }

    /**
     * Pass *True* to request the permission for your bot to send messages to the user.
     */
    public function getRequestWriteAccess(): ?bool
    {
        return $this->requestWriteAccess;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['url']);

        $instance->forwardText = $array['forward_text'] ?? null;
        $instance->botUsername = $array['bot_username'] ?? null;
        $instance->requestWriteAccess = $array['request_write_access'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'url' => $this->url,
            'forward_text' => $this->forwardText,
            'bot_username' => $this->botUsername,
            'request_write_access' => $this->requestWriteAccess,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
