<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\File;
use Rezident\SelfDocumentedTelegramBotSdk\types\PhotoSize;

/**
 * This object represents a sticker.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#sticker
 */
class Sticker implements FromArrayInterface, ToArrayInterface
{
    private ?PhotoSize $thumb = null;

    private ?string $emoji = null;

    private ?string $setName = null;

    private ?File $premiumAnimation = null;

    private ?MaskPosition $maskPosition = null;

    private ?string $customEmojiId = null;

    private ?int $fileSize = null;

    private function __construct(
        private string $fileId,
        private string $fileUniqueId,
        private string $type,
        private int $width,
        private int $height,
        private bool $isAnimated,
        private bool $isVideo
    ) {
    }

    /**
     * @param string $fileId Identifier for this file, which can be used to download or reuse the file
     * @param string $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for
     *                             different bots. Can't be used to download or reuse the file.
     * @param string $type Type of the sticker, currently one of “regular”, “mask”, “custom\_emoji”. The type of the
     *                     sticker is independent from its format, which is determined by the fields *is\_animated* and
     *                     *is\_video*.
     * @param int $width Sticker width
     * @param int $height Sticker height
     * @param bool $isAnimated *True*, if the sticker is [animated](https://telegram.org/blog/animated-stickers)
     * @param bool $isVideo *True*, if the sticker is a
     *                      [video sticker](https://telegram.org/blog/video-stickers-better-reactions)
     */
    public static function new(
        string $fileId,
        string $fileUniqueId,
        string $type,
        int $width,
        int $height,
        bool $isAnimated,
        bool $isVideo,
    ): self {
        return new self($fileId, $fileUniqueId, $type, $width, $height, $isAnimated, $isVideo);
    }

    /**
     * Sticker thumbnail in the .WEBP or .JPG format
     */
    public function thumb(?PhotoSize $thumb): self
    {
        $this->thumb = $thumb;
        return $this;
    }

    /**
     * Emoji associated with the sticker
     */
    public function emoji(?string $emoji): self
    {
        $this->emoji = $emoji;
        return $this;
    }

    /**
     * Name of the sticker set to which the sticker belongs
     */
    public function setName(?string $setName): self
    {
        $this->setName = $setName;
        return $this;
    }

    /**
     * For premium regular stickers, premium animation for the sticker
     */
    public function premiumAnimation(?File $premiumAnimation): self
    {
        $this->premiumAnimation = $premiumAnimation;
        return $this;
    }

    /**
     * For mask stickers, the position where the mask should be placed
     */
    public function maskPosition(?MaskPosition $maskPosition): self
    {
        $this->maskPosition = $maskPosition;
        return $this;
    }

    /**
     * For custom emoji stickers, unique identifier of the custom emoji
     */
    public function customEmojiId(?string $customEmojiId): self
    {
        $this->customEmojiId = $customEmojiId;
        return $this;
    }

    /**
     * File size in bytes
     */
    public function fileSize(?int $fileSize): self
    {
        $this->fileSize = $fileSize;
        return $this;
    }

    /**
     * Identifier for this file, which can be used to download or reuse the file
     */
    public function getFileId(): ?string
    {
        return $this->fileId;
    }

    /**
     * Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be
     * used to download or reuse the file.
     */
    public function getFileUniqueId(): ?string
    {
        return $this->fileUniqueId;
    }

    /**
     * Type of the sticker, currently one of “regular”, “mask”, “custom\_emoji”. The type of the sticker is independent
     * from its format, which is determined by the fields *is\_animated* and *is\_video*.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sticker width
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * Sticker height
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * *True*, if the sticker is [animated](https://telegram.org/blog/animated-stickers)
     */
    public function getIsAnimated(): ?bool
    {
        return $this->isAnimated;
    }

    /**
     * *True*, if the sticker is a [video sticker](https://telegram.org/blog/video-stickers-better-reactions)
     */
    public function getIsVideo(): ?bool
    {
        return $this->isVideo;
    }

    /**
     * Sticker thumbnail in the .WEBP or .JPG format
     */
    public function getThumb(): ?PhotoSize
    {
        return $this->thumb;
    }

    /**
     * Emoji associated with the sticker
     */
    public function getEmoji(): ?string
    {
        return $this->emoji;
    }

    /**
     * Name of the sticker set to which the sticker belongs
     */
    public function getSetName(): ?string
    {
        return $this->setName;
    }

    /**
     * For premium regular stickers, premium animation for the sticker
     */
    public function getPremiumAnimation(): ?File
    {
        return $this->premiumAnimation;
    }

    /**
     * For mask stickers, the position where the mask should be placed
     */
    public function getMaskPosition(): ?MaskPosition
    {
        return $this->maskPosition;
    }

    /**
     * For custom emoji stickers, unique identifier of the custom emoji
     */
    public function getCustomEmojiId(): ?string
    {
        return $this->customEmojiId;
    }

    /**
     * File size in bytes
     */
    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self(
            $array['file_id'],
            $array['file_unique_id'],
            $array['type'],
            $array['width'],
            $array['height'],
            $array['is_animated'],
            $array['is_video'],
        );

        $instance->thumb = PhotoSize::fromArray($array['thumb'] ?? null);
        $instance->emoji = $array['emoji'] ?? null;
        $instance->setName = $array['set_name'] ?? null;
        $instance->premiumAnimation = File::fromArray($array['premium_animation'] ?? null);
        $instance->maskPosition = MaskPosition::fromArray($array['mask_position'] ?? null);
        $instance->customEmojiId = $array['custom_emoji_id'] ?? null;
        $instance->fileSize = $array['file_size'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'file_id' => $this->fileId,
            'file_unique_id' => $this->fileUniqueId,
            'type' => $this->type,
            'width' => $this->width,
            'height' => $this->height,
            'is_animated' => $this->isAnimated,
            'is_video' => $this->isVideo,
            'thumb' => $this->thumb,
            'emoji' => $this->emoji,
            'set_name' => $this->setName,
            'premium_animation' => $this->premiumAnimation,
            'mask_position' => $this->maskPosition,
            'custom_emoji_id' => $this->customEmojiId,
            'file_size' => $this->fileSize,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
