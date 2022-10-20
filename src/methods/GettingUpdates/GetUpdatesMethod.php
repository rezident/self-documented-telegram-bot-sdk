<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\GettingUpdates;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfString;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfUpdate;

/**
 * Use this method to receive incoming updates using long polling
 * ([wiki](https://en.wikipedia.org/wiki/Push_technology#Long_polling)). Returns an Array of
 * [Update](https://core.telegram.org/bots/api#update) objects.
 *
 * > **Notes**
 *
 * > **1.** This method will not work if an outgoing webhook is set up.
 *
 * > **2.** In order to avoid getting duplicate updates, recalculate *offset* after each server response.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#getupdates
 */
class GetUpdatesMethod implements ToArrayInterface
{
    private ?int $offset = null;

    private ?int $limit = null;

    private ?int $timeout = null;

    private ?ArrayOfString $allowedUpdates = null;

    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    /**
     * Identifier of the first update to be returned. Must be greater by one than the highest among the identifiers of
     * previously received updates. By default, updates starting with the earliest unconfirmed update are returned. An
     * update is considered confirmed as soon as [getUpdates](https://core.telegram.org/bots/api#getupdates) is called
     * with an *offset* higher than its *update\_id*. The negative offset can be specified to retrieve updates starting
     * from *-offset* update from the end of the updates queue. All previous updates will forgotten.
     */
    public function offset(?int $offset): self
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * Limits the number of updates to be retrieved. Values between 1-100 are accepted. Defaults to 100.
     */
    public function limit(?int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * Timeout in seconds for long polling. Defaults to 0, i.e. usual short polling. Should be positive, short polling
     * should be used for testing purposes only.
     */
    public function timeout(?int $timeout): self
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * A JSON-serialized list of the update types you want your bot to receive. For example, specify
     * \[“message”, “edited\_channel\_post”, “callback\_query”\] to only receive updates of these types. See
     * [Update](https://core.telegram.org/bots/api#update) for a complete list of available update types. Specify an
     * empty list to receive all update types except *chat\_member* (default). If not specified, the previous setting
     * will be used.
     *
     * Please note that this parameter doesn't affect updates created before the call to the getUpdates, so unwanted
     * updates may be received for a short period of time.
     */
    public function allowedUpdates(?ArrayOfString $allowedUpdates): self
    {
        $this->allowedUpdates = $allowedUpdates;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'offset' => $this->offset,
            'limit' => $this->limit,
            'timeout' => $this->timeout,
            'allowed_updates' => $this->allowedUpdates,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): ArrayOfUpdate
    {
        return ArrayOfUpdate::fromArray($executor->execute($this));
    }
}
