<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents type of a poll, which is allowed to be created and sent when the corresponding button is
 * pressed.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#keyboardbuttonpolltype
 */
class KeyboardButtonPollType implements FromArrayInterface, ToArrayInterface
{
    private ?string $type = null;

    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    /**
     * If *quiz* is passed, the user will be allowed to create only polls in the quiz mode. If *regular* is passed,
     * only regular polls will be allowed. Otherwise, the user will be allowed to create a poll of any type.
     */
    public function type(?string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * If *quiz* is passed, the user will be allowed to create only polls in the quiz mode. If *regular* is passed,
     * only regular polls will be allowed. Otherwise, the user will be allowed to create a poll of any type.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self();

        $instance->type = $array['type'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'type' => $this->type,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
