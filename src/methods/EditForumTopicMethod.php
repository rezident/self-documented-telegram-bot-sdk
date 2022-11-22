<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to edit name and icon of a topic in a forum supergroup chat. The bot must be an administrator in the
 * chat for this to work and must have *can\_manage\_topics* administrator rights, unless it is the creator of the
 * topic. Returns *True* on success.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#editforumtopic
 */
class EditForumTopicMethod implements ToArrayInterface
{
    private function __construct(
        private int|string $chatId,
        private int $messageThreadId,
        private string $name,
        private string $iconCustomEmojiId
    ) {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the
     *                           format `@supergroupusername`)
     * @param int $messageThreadId Unique identifier for the target message thread of the forum topic
     * @param string $name New topic name, 1-128 characters
     * @param string $iconCustomEmojiId New unique identifier of the custom emoji shown as the topic icon. Use
     *                                  [getForumTopicIconStickers](https://core.telegram.org/bots/api#getforumtopiciconstickers)
     *                                  to get all allowed custom emoji identifiers.
     */
    public static function new(int|string $chatId, int $messageThreadId, string $name, string $iconCustomEmojiId): self
    {
        return new self($chatId, $messageThreadId, $name, $iconCustomEmojiId);
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
