<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to close the bot instance before moving it from one local server to another. You need to delete the
 * webhook before calling this method to ensure that the bot isn't launched again after server restart. The method will
 * return error 429 in the first 10 minutes after the bot is launched. Returns *True* on success. Requires no
 * parameters.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#close
 */
class CloseMethod implements ToArrayInterface
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
