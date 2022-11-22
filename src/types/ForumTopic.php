<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a forum topic.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#forumtopic
 */
class ForumTopic implements FromArrayInterface, ToArrayInterface
{
    private ?string $iconCustomEmojiId = null;

    private function __construct(private int $messageThreadId, private string $name, private int $iconColor)
    {
    }

    /**
     * @param int $messageThreadId Unique identifier of the forum topic
     * @param string $name Name of the topic
     * @param int $iconColor Color of the topic icon in RGB format
     */
    public static function new(int $messageThreadId, string $name, int $iconColor): self
    {
        return new self($messageThreadId, $name, $iconColor);
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
     * Unique identifier of the forum topic
     */
    public function getMessageThreadId(): ?int
    {
        return $this->messageThreadId;
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

        $instance = new self($array['message_thread_id'], $array['name'], $array['icon_color']);

        $instance->iconCustomEmojiId = $array['icon_custom_emoji_id'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'message_thread_id' => $this->messageThreadId,
            'name' => $this->name,
            'icon_color' => $this->iconColor,
            'icon_custom_emoji_id' => $this->iconCustomEmojiId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
