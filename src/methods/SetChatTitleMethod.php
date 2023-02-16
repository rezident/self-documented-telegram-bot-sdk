<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to change the title of a chat. Titles can't be changed for private chats. The bot must be an
 * administrator in the chat for this to work and must have the appropriate administrator rights. Returns *True* on
 * success.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setchattitle
 */
class SetChatTitleMethod implements ToArrayInterface
{
    private function __construct(private int|string $chatId, private string $title)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     *                           `@channelusername`)
     * @param string $title New chat title, 1-128 characters
     */
    public static function new(int|string $chatId, string $title): self
    {
        return new self($chatId, $title);
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'title' => $this->title,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
