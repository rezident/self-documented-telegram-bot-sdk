<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to unban a previously banned user in a supergroup or channel. The user will **not** return to the
 * group or channel automatically, but will be able to join via link, etc. The bot must be an administrator for this to
 * work. By default, this method guarantees that after the call the user is not a member of the chat, but will be able
 * to join it. So if the user is a member of the chat they will also be **removed** from the chat. If you don't want
 * this, use the parameter *only\_if\_banned*. Returns *True* on success.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#unbanchatmember
 */
class UnbanChatMemberMethod implements ToArrayInterface
{
    private ?bool $onlyIfBanned = null;

    private function __construct(private int|string $chatId, private int $userId)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target group or username of the target supergroup or channel
     *                           (in the format `@channelusername`)
     * @param int $userId Unique identifier of the target user
     */
    public static function new(int|string $chatId, int $userId): self
    {
        return new self($chatId, $userId);
    }

    /**
     * Do nothing if the user is not banned
     */
    public function onlyIfBanned(?bool $onlyIfBanned): self
    {
        $this->onlyIfBanned = $onlyIfBanned;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'user_id' => $this->userId,
            'only_if_banned' => $this->onlyIfBanned,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
