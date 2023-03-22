<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a service message about an edited forum topic.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#forumtopicedited
 */
class ForumTopicEdited implements FromArrayInterface, ToArrayInterface
{
    private ?string $name = null;

    private ?string $iconCustomEmojiId = null;

    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    /**
     * New name of the topic, if it was edited
     */
    public function name(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * New identifier of the custom emoji shown as the topic icon, if it was edited; an empty string if the icon was
     * removed
     */
    public function iconCustomEmojiId(?string $iconCustomEmojiId): self
    {
        $this->iconCustomEmojiId = $iconCustomEmojiId;
        return $this;
    }

    /**
     * New name of the topic, if it was edited
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * New identifier of the custom emoji shown as the topic icon, if it was edited; an empty string if the icon was
     * removed
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

        $instance = new self();

        $instance->name = $array['name'] ?? null;
        $instance->iconCustomEmojiId = $array['icon_custom_emoji_id'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'name' => $this->name,
            'icon_custom_emoji_id' => $this->iconCustomEmojiId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
