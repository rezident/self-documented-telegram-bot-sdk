<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfSticker;

/**
 * Use this method to get custom emoji stickers, which can be used as a forum topic icon by any user. Requires no
 * parameters. Returns an Array of [Sticker](https://core.telegram.org/bots/api#sticker) objects.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#getforumtopiciconstickers
 */
class GetForumTopicIconStickersMethod implements ToArrayInterface
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

    public function exec(Executable $executor): ArrayOfSticker
    {
        return ArrayOfSticker::fromArray($executor->execute($this));
    }
}
