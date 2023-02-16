<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object defines the criteria used to request a suitable user. The identifier of the selected user will be shared
 * with the bot when the corresponding button is pressed.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#keyboardbuttonrequestuser
 */
class KeyboardButtonRequestUser implements FromArrayInterface, ToArrayInterface
{
    private ?bool $userIsBot = null;

    private ?bool $userIsPremium = null;

    private function __construct(private int $requestId)
    {
    }

    /**
     * @param int $requestId Signed 32-bit identifier of the request, which will be received back in the
     *                       [UserShared](https://core.telegram.org/bots/api#usershared) object. Must be unique within
     *                       the message
     */
    public static function new(int $requestId): self
    {
        return new self($requestId);
    }

    /**
     * Pass *True* to request a bot, pass *False* to request a regular user. If not specified, no additional
     * restrictions are applied.
     */
    public function userIsBot(?bool $userIsBot): self
    {
        $this->userIsBot = $userIsBot;
        return $this;
    }

    /**
     * Pass *True* to request a premium user, pass *False* to request a non-premium user. If not specified, no
     * additional restrictions are applied.
     */
    public function userIsPremium(?bool $userIsPremium): self
    {
        $this->userIsPremium = $userIsPremium;
        return $this;
    }

    /**
     * Signed 32-bit identifier of the request, which will be received back in the
     * [UserShared](https://core.telegram.org/bots/api#usershared) object. Must be unique within the message
     */
    public function getRequestId(): ?int
    {
        return $this->requestId;
    }

    /**
     * Pass *True* to request a bot, pass *False* to request a regular user. If not specified, no additional
     * restrictions are applied.
     */
    public function getUserIsBot(): ?bool
    {
        return $this->userIsBot;
    }

    /**
     * Pass *True* to request a premium user, pass *False* to request a non-premium user. If not specified, no
     * additional restrictions are applied.
     */
    public function getUserIsPremium(): ?bool
    {
        return $this->userIsPremium;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['request_id']);

        $instance->userIsBot = $array['user_is_bot'] ?? null;
        $instance->userIsPremium = $array['user_is_premium'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'request_id' => $this->requestId,
            'user_is_bot' => $this->userIsBot,
            'user_is_premium' => $this->userIsPremium,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
