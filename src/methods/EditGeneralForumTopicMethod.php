<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to edit the name of the 'General' topic in a forum supergroup chat. The bot must be an administrator
 * in the chat for this to work and must have *can\_manage\_topics* administrator rights. Returns *True* on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#editgeneralforumtopic
 */
class EditGeneralForumTopicMethod implements ToArrayInterface
{
    private function __construct(private int|string $chatId, private string $name)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the
     *                           format `@supergroupusername`)
     * @param string $name New topic name, 1-128 characters
     */
    public static function new(int|string $chatId, string $name): self
    {
        return new self($chatId, $name);
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'name' => $this->name,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
