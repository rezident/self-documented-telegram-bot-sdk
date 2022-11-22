<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\ChatPermissions;

/**
 * Use this method to set default chat permissions for all members. The bot must be an administrator in the group or a
 * supergroup for this to work and must have the *can\_restrict\_members* administrator rights. Returns *True* on
 * success.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setchatpermissions
 */
class SetChatPermissionsMethod implements ToArrayInterface
{
    private function __construct(private int|string $chatId, private ChatPermissions $permissions)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the
     *                           format `@supergroupusername`)
     * @param ChatPermissions $permissions A JSON-serialized object for new default chat permissions
     */
    public static function new(int|string $chatId, ChatPermissions $permissions): self
    {
        return new self($chatId, $permissions);
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'permissions' => $this->permissions,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
