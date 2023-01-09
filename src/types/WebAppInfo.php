<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Describes a [Web App](https://core.telegram.org/bots/webapps).
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#webappinfo
 */
class WebAppInfo implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private string $url)
    {
    }

    /**
     * @param string $url An HTTPS URL of a Web App to be opened with additional data as specified in
     *                    [Initializing Web Apps](https://core.telegram.org/bots/webapps#initializing-web-apps)
     */
    public static function new(string $url): self
    {
        return new self($url);
    }

    /**
     * An HTTPS URL of a Web App to be opened with additional data as specified in
     * [Initializing Web Apps](https://core.telegram.org/bots/webapps#initializing-web-apps)
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['url']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'url' => $this->url,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
