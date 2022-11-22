<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\ForumTopic;

/**
 * Use this method to create a topic in a forum supergroup chat. The bot must be an administrator in the chat for this
 * to work and must have the *can\_manage\_topics* administrator rights. Returns information about the created topic as
 * a [ForumTopic](https://core.telegram.org/bots/api#forumtopic) object.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#createforumtopic
 */
class CreateForumTopicMethod implements ToArrayInterface
{
    private ?int $iconColor = null;

    private ?string $iconCustomEmojiId = null;

    private function __construct(private int|string $chatId, private string $name)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the
     *                           format `@supergroupusername`)
     * @param string $name Topic name, 1-128 characters
     */
    public static function new(int|string $chatId, string $name): self
    {
        return new self($chatId, $name);
    }

    /**
     * Color of the topic icon in RGB format. Currently, must be one of 7322096 (0x6FB9F0), 16766590 (0xFFD67E),
     * 13338331 (0xCB86DB), 9367192 (0x8EEE98), 16749490 (0xFF93B2), or 16478047 (0xFB6F5F)
     */
    public function iconColor(?int $iconColor): self
    {
        $this->iconColor = $iconColor;
        return $this;
    }

    /**
     * Unique identifier of the custom emoji shown as the topic icon. Use
     * [getForumTopicIconStickers](https://core.telegram.org/bots/api#getforumtopiciconstickers) to get all allowed
     * custom emoji identifiers.
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
            'name' => $this->name,
            'icon_color' => $this->iconColor,
            'icon_custom_emoji_id' => $this->iconCustomEmojiId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): ForumTopic
    {
        return ForumTopic::fromArray($executor->execute($this));
    }
}
