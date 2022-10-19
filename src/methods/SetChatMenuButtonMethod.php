<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\MenuButton;

/**
 * Use this method to change the bot's menu button in a private chat, or the default menu button. Returns *True* on
 * success.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setchatmenubutton
 */
class SetChatMenuButtonMethod implements ToArrayInterface
{
    private ?int $chatId = null;

    private ?MenuButton $menuButton = null;

    /**
     * Unique identifier for the target private chat. If not specified, default bot's menu button will be changed
     */
    public function chatId(?int $chatId): self
    {
        $this->chatId = $chatId;
        return $this;
    }

    /**
     * A JSON-serialized object for the bot's new menu button. Defaults to
     * [MenuButtonDefault](https://core.telegram.org/bots/api#menubuttondefault)
     */
    public function menuButton(?MenuButton $menuButton): self
    {
        $this->menuButton = $menuButton;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'menu_button' => $this->menuButton,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
