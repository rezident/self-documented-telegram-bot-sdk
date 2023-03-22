<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object defines the criteria used to request a suitable chat. The identifier of the selected chat will be shared
 * with the bot when the corresponding button is pressed.
 * [More about requesting chats »](https://core.telegram.org/bots/features#chat-and-user-selection)
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#keyboardbuttonrequestchat
 */
class KeyboardButtonRequestChat implements FromArrayInterface, ToArrayInterface
{
    private ?bool $chatIsForum = null;

    private ?bool $chatHasUsername = null;

    private ?bool $chatIsCreated = null;

    private ?ChatAdministratorRights $userAdministratorRights = null;

    private ?ChatAdministratorRights $botAdministratorRights = null;

    private ?bool $botIsMember = null;

    private function __construct(private int $requestId, private bool $chatIsChannel)
    {
    }

    /**
     * @param int $requestId Signed 32-bit identifier of the request, which will be received back in the
     *                       [ChatShared](https://core.telegram.org/bots/api#chatshared) object. Must be unique within
     *                       the message
     * @param bool $chatIsChannel Pass *True* to request a channel chat, pass *False* to request a group or a
     *                            supergroup chat.
     */
    public static function new(int $requestId, bool $chatIsChannel): self
    {
        return new self($requestId, $chatIsChannel);
    }

    /**
     * Pass *True* to request a forum supergroup, pass *False* to request a non-forum chat. If not specified, no
     * additional restrictions are applied.
     */
    public function chatIsForum(?bool $chatIsForum): self
    {
        $this->chatIsForum = $chatIsForum;
        return $this;
    }

    /**
     * Pass *True* to request a supergroup or a channel with a username, pass *False* to request a chat without a
     * username. If not specified, no additional restrictions are applied.
     */
    public function chatHasUsername(?bool $chatHasUsername): self
    {
        $this->chatHasUsername = $chatHasUsername;
        return $this;
    }

    /**
     * Pass *True* to request a chat owned by the user. Otherwise, no additional restrictions are applied.
     */
    public function chatIsCreated(?bool $chatIsCreated): self
    {
        $this->chatIsCreated = $chatIsCreated;
        return $this;
    }

    /**
     * A JSON-serialized object listing the required administrator rights of the user in the chat. The rights must be a
     * superset of *bot\_administrator\_rights*. If not specified, no additional restrictions are applied.
     */
    public function userAdministratorRights(?ChatAdministratorRights $userAdministratorRights): self
    {
        $this->userAdministratorRights = $userAdministratorRights;
        return $this;
    }

    /**
     * A JSON-serialized object listing the required administrator rights of the bot in the chat. The rights must be a
     * subset of *user\_administrator\_rights*. If not specified, no additional restrictions are applied.
     */
    public function botAdministratorRights(?ChatAdministratorRights $botAdministratorRights): self
    {
        $this->botAdministratorRights = $botAdministratorRights;
        return $this;
    }

    /**
     * Pass *True* to request a chat with the bot as a member. Otherwise, no additional restrictions are applied.
     */
    public function botIsMember(?bool $botIsMember): self
    {
        $this->botIsMember = $botIsMember;
        return $this;
    }

    /**
     * Signed 32-bit identifier of the request, which will be received back in the
     * [ChatShared](https://core.telegram.org/bots/api#chatshared) object. Must be unique within the message
     */
    public function getRequestId(): ?int
    {
        return $this->requestId;
    }

    /**
     * Pass *True* to request a channel chat, pass *False* to request a group or a supergroup chat.
     */
    public function getChatIsChannel(): ?bool
    {
        return $this->chatIsChannel;
    }

    /**
     * Pass *True* to request a forum supergroup, pass *False* to request a non-forum chat. If not specified, no
     * additional restrictions are applied.
     */
    public function getChatIsForum(): ?bool
    {
        return $this->chatIsForum;
    }

    /**
     * Pass *True* to request a supergroup or a channel with a username, pass *False* to request a chat without a
     * username. If not specified, no additional restrictions are applied.
     */
    public function getChatHasUsername(): ?bool
    {
        return $this->chatHasUsername;
    }

    /**
     * Pass *True* to request a chat owned by the user. Otherwise, no additional restrictions are applied.
     */
    public function getChatIsCreated(): ?bool
    {
        return $this->chatIsCreated;
    }

    /**
     * A JSON-serialized object listing the required administrator rights of the user in the chat. The rights must be a
     * superset of *bot\_administrator\_rights*. If not specified, no additional restrictions are applied.
     */
    public function getUserAdministratorRights(): ?ChatAdministratorRights
    {
        return $this->userAdministratorRights;
    }

    /**
     * A JSON-serialized object listing the required administrator rights of the bot in the chat. The rights must be a
     * subset of *user\_administrator\_rights*. If not specified, no additional restrictions are applied.
     */
    public function getBotAdministratorRights(): ?ChatAdministratorRights
    {
        return $this->botAdministratorRights;
    }

    /**
     * Pass *True* to request a chat with the bot as a member. Otherwise, no additional restrictions are applied.
     */
    public function getBotIsMember(): ?bool
    {
        return $this->botIsMember;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['request_id'], $array['chat_is_channel']);

        $instance->chatIsForum = $array['chat_is_forum'] ?? null;
        $instance->chatHasUsername = $array['chat_has_username'] ?? null;
        $instance->chatIsCreated = $array['chat_is_created'] ?? null;
        $instance->userAdministratorRights = ChatAdministratorRights::fromArray($array['user_administrator_rights'] ?? null);
        $instance->botAdministratorRights = ChatAdministratorRights::fromArray($array['bot_administrator_rights'] ?? null);
        $instance->botIsMember = $array['bot_is_member'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'request_id' => $this->requestId,
            'chat_is_channel' => $this->chatIsChannel,
            'chat_is_forum' => $this->chatIsForum,
            'chat_has_username' => $this->chatHasUsername,
            'chat_is_created' => $this->chatIsCreated,
            'user_administrator_rights' => $this->userAdministratorRights,
            'bot_administrator_rights' => $this->botAdministratorRights,
            'bot_is_member' => $this->botIsMember,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
