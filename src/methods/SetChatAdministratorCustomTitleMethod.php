<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to set a custom title for an administrator in a supergroup promoted by the bot. Returns *True* on
 * success.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setchatadministratorcustomtitle
 */
class SetChatAdministratorCustomTitleMethod implements ToArrayInterface
{
    private function __construct(private int|string $chatId, private int $userId, private string $customTitle)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the
     *                           format `@supergroupusername`)
     * @param int $userId Unique identifier of the target user
     * @param string $customTitle New custom title for the administrator; 0-16 characters, emoji are not allowed
     */
    public static function new(int|string $chatId, int $userId, string $customTitle): self
    {
        return new self($chatId, $userId, $customTitle);
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'user_id' => $this->userId,
            'custom_title' => $this->customTitle,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
