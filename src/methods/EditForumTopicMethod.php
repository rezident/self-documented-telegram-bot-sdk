<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to edit name and icon of a topic in a forum supergroup chat. The bot must be an administrator in the
 * chat for this to work and must have *can\_manage\_topics* administrator rights, unless it is the creator of the
 * topic. Returns *True* on success.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#editforumtopic
 */
class EditForumTopicMethod implements ToArrayInterface
{
    private ?string $name = null;

    private ?string $iconCustomEmojiId = null;

    private function __construct(private int|string $chatId, private int $messageThreadId)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the
     *                           format `@supergroupusername`)
     * @param int $messageThreadId Unique identifier for the target message thread of the forum topic
     */
    public static function new(int|string $chatId, int $messageThreadId): self
    {
        return new self($chatId, $messageThreadId);
    }

    /**
     * New topic name, 0-128 characters. If not specified or empty, the current name of the topic will be kept
     */
    public function name(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * New unique identifier of the custom emoji shown as the topic icon. Use
     * [getForumTopicIconStickers](https://core.telegram.org/bots/api#getforumtopiciconstickers) to get all allowed
     * custom emoji identifiers. Pass an empty string to remove the icon. If not specified, the current icon will be
     * kept
     */
    public function iconCustomEmojiId(?string $iconCustomEmojiId): self
    {
        $this->iconCustomEmojiId = $iconCustomEmojiId;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'message_thread_id' => $this->messageThreadId,
            'name' => $this->name,
            'icon_custom_emoji_id' => $this->iconCustomEmojiId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
