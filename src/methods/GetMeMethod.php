<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\types\User;

class GetMeMethod implements ToArrayInterface
{
    public function toArray(): array
    {
        return [];
    }

    public function exec(Executable $executor): User
    {
        return User::fromArray($executor->execute($this));
    }
}
