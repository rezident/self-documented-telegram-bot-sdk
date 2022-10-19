<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to move a sticker in a set created by the bot to a specific position. Returns *True* on success.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setstickerpositioninset
 */
class SetStickerPositionInSetMethod implements ToArrayInterface
{
    private function __construct(private string $sticker, private int $position)
    {
    }

    /**
     * @param string $sticker File identifier of the sticker
     * @param int $position New sticker position in the set, zero-based
     */
    public static function new(string $sticker, int $position): self
    {
        return new self($sticker, $position);
    }

    public function toArray(): array
    {
        $data = [
            'sticker' => $this->sticker,
            'position' => $this->position,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
