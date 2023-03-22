<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\MenuButton;

/**
 * Use this method to get the current value of the bot's menu button in a private chat, or the default menu button.
 * Returns [MenuButton](https://core.telegram.org/bots/api#menubutton) on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#getchatmenubutton
 */
class GetChatMenuButtonMethod implements ToArrayInterface
{
    private ?int $chatId = null;

    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    /**
     * Unique identifier for the target private chat. If not specified, default bot's menu button will be returned
     */
    public function chatId(?int $chatId): self
    {
        $this->chatId = $chatId;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): MenuButton
    {
        return MenuButton::fromArray($executor->execute($this));
    }
}
