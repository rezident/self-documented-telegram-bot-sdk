<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\User;

/**
 * A simple method for testing your bot's authentication token. Requires no parameters. Returns basic information about
 * the bot in form of a [User](https://core.telegram.org/bots/api#user) object.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#getme
 */
class GetMeMethod implements ToArrayInterface
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

    public function exec(Executable $executor): User
    {
        return User::fromArray($executor->execute($this));
    }
}
