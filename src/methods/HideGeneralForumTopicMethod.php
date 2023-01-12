<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to hide the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat
 * for this to work and must have the *can\_manage\_topics* administrator rights. The topic will be automatically closed
 * if it was open. Returns *True* on success.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#hidegeneralforumtopic
 */
class HideGeneralForumTopicMethod implements ToArrayInterface
{
    private function __construct(private int|string $chatId)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the
     *                           format `@supergroupusername`)
     */
    public static function new(int|string $chatId): self
    {
        return new self($chatId);
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
