<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents a menu button, which launches a [Web App](https://core.telegram.org/bots/webapps).
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#menubuttonwebapp
 */
class MenuButtonWebApp implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private string $type, private string $text, private WebAppInfo $webApp)
    {
    }

    /**
     * @param string $type Type of the button, must be *web\_app*
     * @param string $text Text on the button
     * @param WebAppInfo $webApp Description of the Web App that will be launched when the user presses the button. The
     *                           Web App will be able to send an arbitrary message on behalf of the user using the
     *                           method [answerWebAppQuery](https://core.telegram.org/bots/api#answerwebappquery).
     */
    public static function new(string $type, string $text, WebAppInfo $webApp): self
    {
        return new self($type, $text, $webApp);
    }

    /**
     * Type of the button, must be *web\_app*
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Text on the button
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Description of the Web App that will be launched when the user presses the button. The Web App will be able to
     * send an arbitrary message on behalf of the user using the method
     * [answerWebAppQuery](https://core.telegram.org/bots/api#answerwebappquery).
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

        $instance = new self($array['type'], $array['text'], WebAppInfo::fromArray($array['web_app']));

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'type' => $this->type,
            'text' => $this->text,
            'web_app' => $this->webApp,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
