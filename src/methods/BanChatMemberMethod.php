<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method to ban a user in a group, a supergroup or a channel. In the case of supergroups and channels, the
 * user will not be able to return to the chat on their own using invite links, etc., unless
 * [unbanned](https://core.telegram.org/bots/api#unbanchatmember) first. The bot must be an administrator in the chat
 * for this to work and must have the appropriate administrator rights. Returns *True* on success.
 *
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#banchatmember
 */
class BanChatMemberMethod implements ToArrayInterface
{
    private ?int $untilDate = null;

    private ?bool $revokeMessages = null;

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
     * Date when the user will be unbanned, unix time. If user is banned for more than 366 days or less than 30 seconds
     * from the current time they are considered to be banned forever. Applied for supergroups and channels only.
     */
    public function untilDate(?int $untilDate): self
    {
        $this->untilDate = $untilDate;
        return $this;
    }

    /**
     * Pass *True* to delete all messages from the chat for the user that is being removed. If *False*, the user will
     * be able to see messages in the group that were sent before the user was removed. Always *True* for supergroups
     * and channels.
     */
    public function revokeMessages(?bool $revokeMessages): self
    {
        $this->revokeMessages = $revokeMessages;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'user_id' => $this->userId,
            'until_date' => $this->untilDate,
            'revoke_messages' => $this->revokeMessages,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
