<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to set the title of a created sticker set. Returns *True* on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setstickersettitle
 */
class SetStickerSetTitleMethod implements ToArrayInterface
{
    private function __construct(private string $name, private string $title)
    {
    }

    /**
     * @param string $name Sticker set name
     * @param string $title Sticker set title, 1-64 characters
     */
    public static function new(string $name, string $title): self
    {
        return new self($name, $title);
    }

    public function toArray(): array
    {
        $data = [
            'name' => $this->name,
            'title' => $this->title,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
