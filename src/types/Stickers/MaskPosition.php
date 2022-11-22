<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object describes the position on faces where a mask should be placed by default.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#maskposition
 */
class MaskPosition implements FromArrayInterface, ToArrayInterface
{
    private function __construct(
        private string $point,
        private float $xShift,
        private float $yShift,
        private float $scale
    ) {
    }

    /**
     * @param string $point The part of the face relative to which the mask should be placed. One of “forehead”,
     *                      “eyes”, “mouth”, or “chin”.
     * @param float $xShift Shift by X-axis measured in widths of the mask scaled to the face size, from left to right.
     *                      For example, choosing -1.0 will place mask just to the left of the default mask position.
     * @param float $yShift Shift by Y-axis measured in heights of the mask scaled to the face size, from top to
     *                      bottom. For example, 1.0 will place the mask just below the default mask position.
     * @param float $scale Mask scaling coefficient. For example, 2.0 means double size.
     */
    public static function new(string $point, float $xShift, float $yShift, float $scale): self
    {
        return new self($point, $xShift, $yShift, $scale);
    }

    /**
     * The part of the face relative to which the mask should be placed. One of “forehead”, “eyes”, “mouth”, or “chin”.
     */
    public function getPoint(): ?string
    {
        return $this->point;
    }

    /**
     * Shift by X-axis measured in widths of the mask scaled to the face size, from left to right. For example,
     * choosing -1.0 will place mask just to the left of the default mask position.
     */
    public function getXShift(): ?float
    {
        return $this->xShift;
    }

    /**
     * Shift by Y-axis measured in heights of the mask scaled to the face size, from top to bottom. For example, 1.0
     * will place the mask just below the default mask position.
     */
    public function getYShift(): ?float
    {
        return $this->yShift;
    }

    /**
     * Mask scaling coefficient. For example, 2.0 means double size.
     */
    public function getScale(): ?float
    {
        return $this->scale;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['point'], $array['x_shift'], $array['y_shift'], $array['scale']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'point' => $this->point,
            'x_shift' => $this->xShift,
            'y_shift' => $this->yShift,
            'scale' => $this->scale,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
