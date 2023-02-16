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
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setchatpermissions
 */
class SetChatPermissionsMethod implements ToArrayInterface
{
    private ?bool $useIndependentChatPermissions = null;

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

    /**
     * Pass *True* if chat permissions are set independently. Otherwise, the *can\_send\_other\_messages* and
     * *can\_add\_web\_page\_previews* permissions will imply the *can\_send\_messages*, *can\_send\_audios*,
     * *can\_send\_documents*, *can\_send\_photos*, *can\_send\_videos*, *can\_send\_video\_notes*, and
     * *can\_send\_voice\_notes* permissions; the *can\_send\_polls* permission will imply the *can\_send\_messages*
     * permission.
     */
    public function useIndependentChatPermissions(?bool $useIndependentChatPermissions): self
    {
        $this->useIndependentChatPermissions = $useIndependentChatPermissions;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'permissions' => $this->permissions,
            'use_independent_chat_permissions' => $this->useIndependentChatPermissions,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
