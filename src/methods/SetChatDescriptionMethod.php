<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to change the description of a group, a supergroup or a channel. The bot must be an administrator in
 * the chat for this to work and must have the appropriate administrator rights. Returns *True* on success.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setchatdescription
 */
class SetChatDescriptionMethod implements ToArrayInterface
{
    private ?string $description = null;

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

    /**
     * New chat description, 0-255 characters
     */
    public function description(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'description' => $this->description,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
