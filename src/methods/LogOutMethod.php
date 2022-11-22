<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to log out from the cloud Bot API server before launching the bot locally. You **must** log out the
 * bot before running it locally, otherwise there is no guarantee that the bot will receive updates. After a successful
 * call, you can immediately log in on a local server, but will not be able to log in back to the cloud Bot API server
 * for 10 minutes. Returns *True* on success. Requires no parameters.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#logout
 */
class LogOutMethod implements ToArrayInterface
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

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
