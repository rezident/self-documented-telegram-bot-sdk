<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Stickers\MaskPosition;

/**
 * Use this method to change the [mask position](https://core.telegram.org/bots/api#maskposition) of a mask sticker. The
 * sticker must belong to a sticker set that was created by the bot. Returns *True* on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setstickermaskposition
 */
class SetStickerMaskPositionMethod implements ToArrayInterface
{
    private ?MaskPosition $maskPosition = null;

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

    /**
     * A JSON-serialized object with the position where the mask should be placed on faces. Omit the parameter to
     * remove the mask position.
     */
    public function maskPosition(?MaskPosition $maskPosition): self
    {
        $this->maskPosition = $maskPosition;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'sticker' => $this->sticker,
            'mask_position' => $this->maskPosition,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
