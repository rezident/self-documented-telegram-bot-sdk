<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\GettingUpdates;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\GettingUpdates\WebhookInfo;

/**
 * Use this method to get current webhook status. Requires no parameters. On success, returns a
 * [WebhookInfo](https://core.telegram.org/bots/api#webhookinfo) object. If the bot is using
 * [getUpdates](https://core.telegram.org/bots/api#getupdates), will return an object with the *url* field empty.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#getwebhookinfo
 */
class GetWebhookInfoMethod implements ToArrayInterface
{
    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    public function toArray(): array
    {
        return [];
    }

    public function exec(Executable $executor): WebhookInfo
    {
        return WebhookInfo::fromArray($executor->execute($this));
    }
}
