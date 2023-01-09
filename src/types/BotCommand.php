<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a bot command.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#botcommand
 */
class BotCommand implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private string $command, private string $description)
    {
    }

    /**
     * @param string $command Text of the command; 1-32 characters. Can contain only lowercase English letters, digits
     *                        and underscores.
     * @param string $description Description of the command; 1-256 characters.
     */
    public static function new(string $command, string $description): self
    {
        return new self($command, $description);
    }

    /**
     * Text of the command; 1-32 characters. Can contain only lowercase English letters, digits and underscores.
     */
    public function getCommand(): ?string
    {
        return $this->command;
    }

    /**
     * Description of the command; 1-256 characters.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['command'], $array['description']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'command' => $this->command,
            'description' => $this->description,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
