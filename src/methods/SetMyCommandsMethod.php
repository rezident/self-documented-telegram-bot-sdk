<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfBotCommand;
use Rezident\SelfDocumentedTelegramBotSdk\types\BotCommandScope;

/**
 * Use this method to change the list of the bot's commands. See
 * [this manual](https://core.telegram.org/bots/features#commands) for more details about bot commands. Returns *True*
 * on success.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setmycommands
 */
class SetMyCommandsMethod implements ToArrayInterface
{
    private ?BotCommandScope $scope = null;

    private ?string $languageCode = null;

    private function __construct(private ArrayOfBotCommand $commands)
    {
    }

    /**
     * @param ArrayOfBotCommand $commands A JSON-serialized list of bot commands to be set as the list of the bot's
     *                                    commands. At most 100 commands can be specified.
     */
    public static function new(ArrayOfBotCommand $commands): self
    {
        return new self($commands);
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
            'commands' => $this->commands,
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
