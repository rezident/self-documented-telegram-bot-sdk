<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfSticker;
use Rezident\SelfDocumentedTelegramBotSdk\types\PhotoSize;

/**
 * This object represents a sticker set.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#stickerset
 */
class StickerSet implements FromArrayInterface, ToArrayInterface
{
    private ?PhotoSize $thumb = null;

    private function __construct(
        private string $name,
        private string $title,
        private string $stickerType,
        private bool $isAnimated,
        private bool $isVideo,
        private ArrayOfSticker $stickers
    ) {
    }

    /**
     * @param string $name Sticker set name
     * @param string $title Sticker set title
     * @param string $stickerType Type of stickers in the set, currently one of “regular”, “mask”, “custom\_emoji”
     * @param bool $isAnimated *True*, if the sticker set contains
     *                         [animated stickers](https://telegram.org/blog/animated-stickers)
     * @param bool $isVideo *True*, if the sticker set contains
     *                      [video stickers](https://telegram.org/blog/video-stickers-better-reactions)
     * @param ArrayOfSticker $stickers List of all set stickers
     */
    public static function new(
        string $name,
        string $title,
        string $stickerType,
        bool $isAnimated,
        bool $isVideo,
        ArrayOfSticker $stickers,
    ): self {
        return new self($name, $title, $stickerType, $isAnimated, $isVideo, $stickers);
    }

    /**
     * Sticker set thumbnail in the .WEBP, .TGS, or .WEBM format
     */
    public function thumb(?PhotoSize $thumb): self
    {
        $this->thumb = $thumb;
        return $this;
    }

    /**
     * Sticker set name
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sticker set title
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Type of stickers in the set, currently one of “regular”, “mask”, “custom\_emoji”
     */
    public function getStickerType(): ?string
    {
        return $this->stickerType;
    }

    /**
     * *True*, if the sticker set contains [animated stickers](https://telegram.org/blog/animated-stickers)
     */
    public function getIsAnimated(): ?bool
    {
        return $this->isAnimated;
    }

    /**
     * *True*, if the sticker set contains [video stickers](https://telegram.org/blog/video-stickers-better-reactions)
     */
    public function getIsVideo(): ?bool
    {
        return $this->isVideo;
    }

    /**
     * List of all set stickers
     */
    public function getStickers(): ?ArrayOfSticker
    {
        return $this->stickers;
    }

    /**
     * Sticker set thumbnail in the .WEBP, .TGS, or .WEBM format
     */
    public function getThumb(): ?PhotoSize
    {
        return $this->thumb;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self(
            $array['name'],
            $array['title'],
            $array['sticker_type'],
            $array['is_animated'],
            $array['is_video'],
            ArrayOfSticker::fromArray($array['stickers']),
        );

        $instance->thumb = PhotoSize::fromArray($array['thumb'] ?? null);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'name' => $this->name,
            'title' => $this->title,
            'sticker_type' => $this->stickerType,
            'is_animated' => $this->isAnimated,
            'is_video' => $this->isVideo,
            'stickers' => $this->stickers,
            'thumb' => $this->thumb,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
