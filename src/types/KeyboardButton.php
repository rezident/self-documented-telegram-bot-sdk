<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents one button of the reply keyboard. For simple text buttons *String* can be used instead of this
 * object to specify text of the button. Optional fields *web\_app*, *request\_contact*, *request\_location*, and
 * *request\_poll* are mutually exclusive.
 *
 * **Note:** *request\_contact* and *request\_location* options will only work in Telegram versions released after 9
 * April, 2016. Older clients will display *unsupported message*.
 *
 * **Note:** *request\_poll* option will only work in Telegram versions released after 23 January, 2020. Older clients
 * will display *unsupported message*.
 *
 * **Note:** *web\_app* option will only work in Telegram versions released after 16 April, 2022. Older clients will
 * display *unsupported message*.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#keyboardbutton
 */
class KeyboardButton implements FromArrayInterface, ToArrayInterface
{
    private ?bool $requestContact = null;

    private ?bool $requestLocation = null;

    private ?KeyboardButtonPollType $requestPoll = null;

    private ?WebAppInfo $webApp = null;

    private function __construct(private string $text)
    {
    }

    /**
     * @param string $text Text of the button. If none of the optional fields are used, it will be sent as a message
     *                     when the button is pressed
     */
    public static function new(string $text): self
    {
        return new self($text);
    }

    /**
     * If *True*, the user's phone number will be sent as a contact when the button is pressed. Available in private
     * chats only.
     */
    public function requestContact(?bool $requestContact): self
    {
        $this->requestContact = $requestContact;
        return $this;
    }

    /**
     * If *True*, the user's current location will be sent when the button is pressed. Available in private chats only.
     */
    public function requestLocation(?bool $requestLocation): self
    {
        $this->requestLocation = $requestLocation;
        return $this;
    }

    /**
     * If specified, the user will be asked to create a poll and send it to the bot when the button is pressed.
     * Available in private chats only.
     */
    public function requestPoll(?KeyboardButtonPollType $requestPoll): self
    {
        $this->requestPoll = $requestPoll;
        return $this;
    }

    /**
     * If specified, the described [Web App](https://core.telegram.org/bots/webapps) will be launched when the button
     * is pressed. The Web App will be able to send a “web\_app\_data” service message. Available in private chats
     * only.
     */
    public function webApp(?WebAppInfo $webApp): self
    {
        $this->webApp = $webApp;
        return $this;
    }

    /**
     * Text of the button. If none of the optional fields are used, it will be sent as a message when the button is
     * pressed
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * If *True*, the user's phone number will be sent as a contact when the button is pressed. Available in private
     * chats only.
     */
    public function getRequestContact(): ?bool
    {
        return $this->requestContact;
    }

    /**
     * If *True*, the user's current location will be sent when the button is pressed. Available in private chats only.
     */
    public function getRequestLocation(): ?bool
    {
        return $this->requestLocation;
    }

    /**
     * If specified, the user will be asked to create a poll and send it to the bot when the button is pressed.
     * Available in private chats only.
     */
    public function getRequestPoll(): ?KeyboardButtonPollType
    {
        return $this->requestPoll;
    }

    /**
     * If specified, the described [Web App](https://core.telegram.org/bots/webapps) will be launched when the button
     * is pressed. The Web App will be able to send a “web\_app\_data” service message. Available in private chats
     * only.
     */
    public function getWebApp(): ?WebAppInfo
    {
        return $this->webApp;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['text']);

        $instance->requestContact = $array['request_contact'] ?? null;
        $instance->requestLocation = $array['request_location'] ?? null;
        $instance->requestPoll = KeyboardButtonPollType::fromArray($array['request_poll'] ?? null);
        $instance->webApp = WebAppInfo::fromArray($array['web_app'] ?? null);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'text' => $this->text,
            'request_contact' => $this->requestContact,
            'request_location' => $this->requestLocation,
            'request_poll' => $this->requestPoll,
            'web_app' => $this->webApp,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
