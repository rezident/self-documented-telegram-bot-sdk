<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Describes data sent from a [Web App](https://core.telegram.org/bots/webapps) to the bot.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#webappdata
 */
class WebAppData implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private string $data, private string $buttonText)
    {
    }

    /**
     * @param string $data The data. Be aware that a bad client can send arbitrary data in this field.
     * @param string $buttonText Text of the *web\_app* keyboard button from which the Web App was opened. Be aware
     *                           that a bad client can send arbitrary data in this field.
     */
    public static function new(string $data, string $buttonText): self
    {
        return new self($data, $buttonText);
    }

    /**
     * The data. Be aware that a bad client can send arbitrary data in this field.
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * Text of the *web\_app* keyboard button from which the Web App was opened. Be aware that a bad client can send
     * arbitrary data in this field.
     */
    public function getButtonText(): ?string
    {
        return $this->buttonText;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['data'], $array['button_text']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'data' => $this->data,
            'button_text' => $this->buttonText,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
