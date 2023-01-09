<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to set a new group sticker set for a supergroup. The bot must be an administrator in the chat for
 * this to work and must have the appropriate administrator rights. Use the field *can\_set\_sticker\_set* optionally
 * returned in [getChat](https://core.telegram.org/bots/api#getchat) requests to check if the bot can use this method.
 * Returns *True* on success.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setchatstickerset
 */
class SetChatStickerSetMethod implements ToArrayInterface
{
    private function __construct(private int|string $chatId, private string $stickerSetName)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the
     *                           format `@supergroupusername`)
     * @param string $stickerSetName Name of the sticker set to be set as the group sticker set
     */
    public static function new(int|string $chatId, string $stickerSetName): self
    {
        return new self($chatId, $stickerSetName);
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'sticker_set_name' => $this->stickerSetName,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
