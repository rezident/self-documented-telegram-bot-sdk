<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a service message about General forum topic hidden in the chat. Currently holds no
 * information.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#generalforumtopichidden
 */
class GeneralForumTopicHidden implements FromArrayInterface, ToArrayInterface
{
    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self();

        return $instance;
    }

    public function toArray(): array
    {
        return [];
    }
}
