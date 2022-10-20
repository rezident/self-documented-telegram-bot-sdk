<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfBotCommand;
use Rezident\SelfDocumentedTelegramBotSdk\types\BotCommandScope;

/**
 * Use this method to get the current list of the bot's commands for the given scope and user language. Returns an Array
 * of [BotCommand](https://core.telegram.org/bots/api#botcommand) objects. If commands aren't set, an empty list is
 * returned.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#getmycommands
 */
class GetMyCommandsMethod implements ToArrayInterface
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
     * A JSON-serialized object, describing scope of users. Defaults to
     * [BotCommandScopeDefault](https://core.telegram.org/bots/api#botcommandscopedefault).
     */
    public function scope(?BotCommandScope $scope): self
    {
        $this->scope = $scope;
        return $this;
    }

    /**
     * A two-letter ISO 639-1 language code or an empty string
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

    public function exec(Executable $executor): ArrayOfBotCommand
    {
        return ArrayOfBotCommand::fromArray($executor->execute($this));
    }
}
