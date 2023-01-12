<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a service message about a new forum topic created in the chat.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#forumtopiccreated
 */
class ForumTopicCreated implements FromArrayInterface, ToArrayInterface
{
    private ?string $iconCustomEmojiId = null;

    private function __construct(private string $name, private int $iconColor)
    {
    }

    /**
     * @param string $name Name of the topic
     * @param int $iconColor Color of the topic icon in RGB format
     */
    public static function new(string $name, int $iconColor): self
    {
        return new self($name, $iconColor);
    }

    /**
     * Unique identifier of the custom emoji shown as the topic icon
     */
    public function iconCustomEmojiId(?string $iconCustomEmojiId): self
    {
        $this->iconCustomEmojiId = $iconCustomEmojiId;
        return $this;
    }

    /**
     * Name of the topic
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Color of the topic icon in RGB format
     */
    public function getIconColor(): ?int
    {
        return $this->iconColor;
    }

    /**
     * Unique identifier of the custom emoji shown as the topic icon
     */
    public function getIconCustomEmojiId(): ?string
    {
        return $this->iconCustomEmojiId;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['name'], $array['icon_color']);

        $instance->iconCustomEmojiId = $array['icon_custom_emoji_id'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'name' => $this->name,
            'icon_color' => $this->iconColor,
            'icon_custom_emoji_id' => $this->iconCustomEmojiId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
