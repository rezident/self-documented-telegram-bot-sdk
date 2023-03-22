<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to delete a sticker set that was created by the bot. Returns *True* on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#deletestickerset
 */
class DeleteStickerSetMethod implements ToArrayInterface
{
    private function __construct(private string $name)
    {
    }

    /**
     * @param string $name Sticker set name
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

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
