<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\BotCommandScope;

/**
 * Use this method to delete the list of the bot's commands for the given scope and user language. After deletion,
 * [higher level commands](https://core.telegram.org/bots/api#determining-list-of-commands) will be shown to affected
 * users. Returns *True* on success.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#deletemycommands
 */
class DeleteMyCommandsMethod implements ToArrayInterface
{
    private ?BotCommandScope $scope = null;

    private ?string $languageCode = null;

    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    /**
     * A JSON-serialized object, describing scope of users for which the commands are relevant. Defaults to
     * [BotCommandScopeDefault](https://core.telegram.org/bots/api#botcommandscopedefault).
     */
    public function scope(?BotCommandScope $scope): self
    {
        $this->scope = $scope;
        return $this;
    }

    /**
     * A two-letter ISO 639-1 language code. If empty, commands will be applied to all users from the given scope, for
     * whose language there are no dedicated commands
     */
    public function languageCode(?string $languageCode): self
    {
        $this->languageCode = $languageCode;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'scope' => $this->scope,
            'language_code' => $this->languageCode,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
