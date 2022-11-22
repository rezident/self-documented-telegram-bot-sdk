<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\GettingUpdates;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to remove webhook integration if you decide to switch back to
 * [getUpdates](https://core.telegram.org/bots/api#getupdates). Returns *True* on success.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#deletewebhook
 */
class DeleteWebhookMethod implements ToArrayInterface
{
    private ?bool $dropPendingUpdates = null;

    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    /**
     * Pass *True* to drop all pending updates
     */
    public function dropPendingUpdates(?bool $dropPendingUpdates): self
    {
        $this->dropPendingUpdates = $dropPendingUpdates;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'drop_pending_updates' => $this->dropPendingUpdates,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
