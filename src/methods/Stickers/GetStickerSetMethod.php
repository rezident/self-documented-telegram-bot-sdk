<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Stickers\StickerSet;

/**
 * Use this method to get a sticker set. On success, a [StickerSet](https://core.telegram.org/bots/api#stickerset)
 * object is returned.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#getstickerset
 */
class GetStickerSetMethod implements ToArrayInterface
{
    private function __construct(private string $name)
    {
    }

    /**
     * @param string $name Name of the sticker set
     */
    public static function new(string $name): self
    {
        return new self($name);
    }

    public function toArray(): array
    {
        $data = [
            'name' => $this->name,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): StickerSet
    {
        return StickerSet::fromArray($executor->execute($this));
    }
}
