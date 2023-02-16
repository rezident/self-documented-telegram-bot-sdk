<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\InputFile;

/**
 * Use this method to set a new profile photo for the chat. Photos can't be changed for private chats. The bot must be
 * an administrator in the chat for this to work and must have the appropriate administrator rights. Returns *True* on
 * success.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setchatphoto
 */
class SetChatPhotoMethod implements ToArrayInterface
{
    private function __construct(private int|string $chatId, private InputFile $photo)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     *                           `@channelusername`)
     * @param InputFile $photo New chat photo, uploaded using multipart/form-data
     */
    public static function new(int|string $chatId, InputFile $photo): self
    {
        return new self($chatId, $photo);
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'photo' => $this->photo,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
