<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to generate a new primary invite link for a chat; any previously generated primary link is revoked.
 * The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights.
 * Returns the new invite link as *String* on success.
 *
 * > Note: Each administrator in a chat generates their own invite links. Bots can't use invite links generated by other
 * administrators. If you want your bot to work with invite links, it will need to generate its own link using
 * [exportChatInviteLink](https://core.telegram.org/bots/api#exportchatinvitelink) or by calling the
 * [getChat](https://core.telegram.org/bots/api#getchat) method. If your bot needs to generate a new primary invite link
 * replacing its previous one, use [exportChatInviteLink](https://core.telegram.org/bots/api#exportchatinvitelink)
 * again.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#exportchatinvitelink
 */
class ExportChatInviteLinkMethod implements ToArrayInterface
{
    private function __construct(private int|string $chatId)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     *                           `@channelusername`)
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

    public function exec(Executable $executor): string
    {
        return $executor->execute($this);
    }
}