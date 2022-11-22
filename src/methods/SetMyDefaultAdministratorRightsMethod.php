<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\ChatAdministratorRights;

/**
 * Use this method to change the default administrator rights requested by the bot when it's added as an administrator
 * to groups or channels. These rights will be suggested to users, but they are are free to modify the list before
 * adding the bot. Returns *True* on success.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setmydefaultadministratorrights
 */
class SetMyDefaultAdministratorRightsMethod implements ToArrayInterface
{
    private ?ChatAdministratorRights $rights = null;

    private ?bool $forChannels = null;

    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    /**
     * A JSON-serialized object describing new default administrator rights. If not specified, the default
     * administrator rights will be cleared.
     */
    public function rights(?ChatAdministratorRights $rights): self
    {
        $this->rights = $rights;
        return $this;
    }

    /**
     * Pass *True* to change the default administrator rights of the bot in channels. Otherwise, the default
     * administrator rights of the bot for groups and supergroups will be changed.
     */
    public function forChannels(?bool $forChannels): self
    {
        $this->forChannels = $forChannels;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'rights' => $this->rights,
            'for_channels' => $this->forChannels,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
