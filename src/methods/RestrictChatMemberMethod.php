<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\ChatPermissions;

/**
 * Use this method to restrict a user in a supergroup. The bot must be an administrator in the supergroup for this to
 * work and must have the appropriate administrator rights. Pass *True* for all permissions to lift restrictions from a
 * user. Returns *True* on success.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#restrictchatmember
 */
class RestrictChatMemberMethod implements ToArrayInterface
{
    private ?int $untilDate = null;

    private function __construct(private int|string $chatId, private int $userId, private ChatPermissions $permissions)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the
     *                           format `@supergroupusername`)
     * @param int $userId Unique identifier of the target user
     * @param ChatPermissions $permissions A JSON-serialized object for new user permissions
     */
    public static function new(int|string $chatId, int $userId, ChatPermissions $permissions): self
    {
        return new self($chatId, $userId, $permissions);
    }

    /**
     * Date when restrictions will be lifted for the user, unix time. If user is restricted for more than 366 days or
     * less than 30 seconds from the current time, they are considered to be restricted forever
     */
    public function untilDate(?int $untilDate): self
    {
        $this->untilDate = $untilDate;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'user_id' => $this->userId,
            'permissions' => $this->permissions,
            'until_date' => $this->untilDate,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
