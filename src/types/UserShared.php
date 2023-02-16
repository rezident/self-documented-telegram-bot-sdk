<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object contains information about the user whose identifier was shared with the bot using a
 * [KeyboardButtonRequestUser](https://core.telegram.org/bots/api#keyboardbuttonrequestuser) button.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#usershared
 */
class UserShared implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private int $requestId, private int $userId)
    {
    }

    /**
     * @param int $requestId Identifier of the request
     * @param int $userId Identifier of the shared user. This number may have more than 32 significant bits and some
     *                    programming languages may have difficulty/silent defects in interpreting it. But it has at
     *                    most 52 significant bits, so a 64-bit integer or double-precision float type are safe for
     *                    storing this identifier. The bot may not have access to the user and could be unable to use
     *                    this identifier, unless the user is already known to the bot by some other means.
     */
    public static function new(int $requestId, int $userId): self
    {
        return new self($requestId, $userId);
    }

    /**
     * Identifier of the request
     */
    public function getRequestId(): ?int
    {
        return $this->requestId;
    }

    /**
     * Identifier of the shared user. This number may have more than 32 significant bits and some programming languages
     * may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit
     * integer or double-precision float type are safe for storing this identifier. The bot may not have access to the
     * user and could be unable to use this identifier, unless the user is already known to the bot by some other
     * means.
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['request_id'], $array['user_id']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'request_id' => $this->requestId,
            'user_id' => $this->userId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
