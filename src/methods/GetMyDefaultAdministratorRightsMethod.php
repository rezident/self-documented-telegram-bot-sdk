<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\ChatAdministratorRights;

/**
 * Use this method to get the current default administrator rights of the bot. Returns
 * [ChatAdministratorRights](https://core.telegram.org/bots/api#chatadministratorrights) on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#getmydefaultadministratorrights
 */
class GetMyDefaultAdministratorRightsMethod implements ToArrayInterface
{
    private ?bool $forChannels = null;

    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    /**
     * Pass *True* to get default administrator rights of the bot in channels. Otherwise, default administrator rights
     * of the bot for groups and supergroups will be returned.
     */
    public function forChannels(?bool $forChannels): self
    {
        $this->forChannels = $forChannels;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'for_channels' => $this->forChannels,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): ChatAdministratorRights
    {
        return ChatAdministratorRights::fromArray($executor->execute($this));
    }
}
