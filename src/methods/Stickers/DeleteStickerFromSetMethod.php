<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to delete a sticker from a set created by the bot. Returns *True* on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#deletestickerfromset
 */
class DeleteStickerFromSetMethod implements ToArrayInterface
{
    private function __construct(private string $sticker)
    {
    }

    /**
     * @param string $sticker File identifier of the sticker
     */
    public static function new(string $sticker): self
    {
        return new self($sticker);
    }

    public function toArray(): array
    {
        $data = [
            'sticker' => $this->sticker,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
