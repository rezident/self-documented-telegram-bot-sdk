<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\GettingUpdates;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\CallbackQuery;
use Rezident\SelfDocumentedTelegramBotSdk\types\ChatJoinRequest;
use Rezident\SelfDocumentedTelegramBotSdk\types\ChatMemberUpdated;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode\ChosenInlineResult;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode\InlineQuery;
use Rezident\SelfDocumentedTelegramBotSdk\types\Message;
use Rezident\SelfDocumentedTelegramBotSdk\types\Payments\PreCheckoutQuery;
use Rezident\SelfDocumentedTelegramBotSdk\types\Payments\ShippingQuery;
use Rezident\SelfDocumentedTelegramBotSdk\types\Poll;
use Rezident\SelfDocumentedTelegramBotSdk\types\PollAnswer;

/**
 * This [object](https://core.telegram.org/bots/api#available-types) represents an incoming update.
 *
 * At most **one** of the optional parameters can be present in any given update.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#update
 */
class Update implements FromArrayInterface, ToArrayInterface
{
    private ?Message $message = null;

    private ?Message $editedMessage = null;

    private ?Message $channelPost = null;

    private ?Message $editedChannelPost = null;

    private ?InlineQuery $inlineQuery = null;

    private ?ChosenInlineResult $chosenInlineResult = null;

    private ?CallbackQuery $callbackQuery = null;

    private ?ShippingQuery $shippingQuery = null;

    private ?PreCheckoutQuery $preCheckoutQuery = null;

    private ?Poll $poll = null;

    private ?PollAnswer $pollAnswer = null;

    private ?ChatMemberUpdated $myChatMember = null;

    private ?ChatMemberUpdated $chatMember = null;

    private ?ChatJoinRequest $chatJoinRequest = null;

    private function __construct(private int $updateId)
    {
    }

    /**
     * @param int $updateId The update's unique identifier. Update identifiers start from a certain positive number and
     *                      increase sequentially. This ID becomes especially handy if you're using
     *                      [webhooks](https://core.telegram.org/bots/api#setwebhook), since it allows you to ignore
     *                      repeated updates or to restore the correct update sequence, should they get out of order.
     *                      If there are no new updates for at least a week, then identifier of the next update will be
     *                      chosen randomly instead of sequentially.
     */
    public static function new(int $updateId): self
    {
        return new self($updateId);
    }

    /**
     * New incoming message of any kind - text, photo, sticker, etc.
     */
    public function message(?Message $message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * New version of a message that is known to the bot and was edited
     */
    public function editedMessage(?Message $editedMessage): self
    {
        $this->editedMessage = $editedMessage;
        return $this;
    }

    /**
     * New incoming channel post of any kind - text, photo, sticker, etc.
     */
    public function channelPost(?Message $channelPost): self
    {
        $this->channelPost = $channelPost;
        return $this;
    }

    /**
     * New version of a channel post that is known to the bot and was edited
     */
    public function editedChannelPost(?Message $editedChannelPost): self
    {
        $this->editedChannelPost = $editedChannelPost;
        return $this;
    }

    /**
     * New incoming [inline](https://core.telegram.org/bots/api#inline-mode) query
     */
    public function inlineQuery(?InlineQuery $inlineQuery): self
    {
        $this->inlineQuery = $inlineQuery;
        return $this;
    }

    /**
     * The result of an [inline](https://core.telegram.org/bots/api#inline-mode) query that was chosen by a user and
     * sent to their chat partner. Please see our documentation on the
     * [feedback collecting](https://core.telegram.org/bots/inline#collecting-feedback) for details on how to enable
     * these updates for your bot.
     */
    public function chosenInlineResult(?ChosenInlineResult $chosenInlineResult): self
    {
        $this->chosenInlineResult = $chosenInlineResult;
        return $this;
    }

    /**
     * New incoming callback query
     */
    public function callbackQuery(?CallbackQuery $callbackQuery): self
    {
        $this->callbackQuery = $callbackQuery;
        return $this;
    }

    /**
     * New incoming shipping query. Only for invoices with flexible price
     */
    public function shippingQuery(?ShippingQuery $shippingQuery): self
    {
        $this->shippingQuery = $shippingQuery;
        return $this;
    }

    /**
     * New incoming pre-checkout query. Contains full information about checkout
     */
    public function preCheckoutQuery(?PreCheckoutQuery $preCheckoutQuery): self
    {
        $this->preCheckoutQuery = $preCheckoutQuery;
        return $this;
    }

    /**
     * New poll state. Bots receive only updates about stopped polls and polls, which are sent by the bot
     */
    public function poll(?Poll $poll): self
    {
        $this->poll = $poll;
        return $this;
    }

    /**
     * A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were sent by the
     * bot itself.
     */
    public function pollAnswer(?PollAnswer $pollAnswer): self
    {
        $this->pollAnswer = $pollAnswer;
        return $this;
    }

    /**
     * The bot's chat member status was updated in a chat. For private chats, this update is received only when the bot
     * is blocked or unblocked by the user.
     */
    public function myChatMember(?ChatMemberUpdated $myChatMember): self
    {
        $this->myChatMember = $myChatMember;
        return $this;
    }

    /**
     * A chat member's status was updated in a chat. The bot must be an administrator in the chat and must explicitly
     * specify “chat\_member” in the list of *allowed\_updates* to receive these updates.
     */
    public function chatMember(?ChatMemberUpdated $chatMember): self
    {
        $this->chatMember = $chatMember;
        return $this;
    }

    /**
     * A request to join the chat has been sent. The bot must have the *can\_invite\_users* administrator right in the
     * chat to receive these updates.
     */
    public function chatJoinRequest(?ChatJoinRequest $chatJoinRequest): self
    {
        $this->chatJoinRequest = $chatJoinRequest;
        return $this;
    }

    /**
     * The update's unique identifier. Update identifiers start from a certain positive number and increase
     * sequentially. This ID becomes especially handy if you're using
     * [webhooks](https://core.telegram.org/bots/api#setwebhook), since it allows you to ignore repeated updates or to
     * restore the correct update sequence, should they get out of order. If there are no new updates for at least a
     * week, then identifier of the next update will be chosen randomly instead of sequentially.
     */
    public function getUpdateId(): ?int
    {
        return $this->updateId;
    }

    /**
     * New incoming message of any kind - text, photo, sticker, etc.
     */
    public function getMessage(): ?Message
    {
        return $this->message;
    }

    /**
     * New version of a message that is known to the bot and was edited
     */
    public function getEditedMessage(): ?Message
    {
        return $this->editedMessage;
    }

    /**
     * New incoming channel post of any kind - text, photo, sticker, etc.
     */
    public function getChannelPost(): ?Message
    {
        return $this->channelPost;
    }

    /**
     * New version of a channel post that is known to the bot and was edited
     */
    public function getEditedChannelPost(): ?Message
    {
        return $this->editedChannelPost;
    }

    /**
     * New incoming [inline](https://core.telegram.org/bots/api#inline-mode) query
     */
    public function getInlineQuery(): ?InlineQuery
    {
        return $this->inlineQuery;
    }

    /**
     * The result of an [inline](https://core.telegram.org/bots/api#inline-mode) query that was chosen by a user and
     * sent to their chat partner. Please see our documentation on the
     * [feedback collecting](https://core.telegram.org/bots/inline#collecting-feedback) for details on how to enable
     * these updates for your bot.
     */
    public function getChosenInlineResult(): ?ChosenInlineResult
    {
        return $this->chosenInlineResult;
    }

    /**
     * New incoming callback query
     */
    public function getCallbackQuery(): ?CallbackQuery
    {
        return $this->callbackQuery;
    }

    /**
     * New incoming shipping query. Only for invoices with flexible price
     */
    public function getShippingQuery(): ?ShippingQuery
    {
        return $this->shippingQuery;
    }

    /**
     * New incoming pre-checkout query. Contains full information about checkout
     */
    public function getPreCheckoutQuery(): ?PreCheckoutQuery
    {
        return $this->preCheckoutQuery;
    }

    /**
     * New poll state. Bots receive only updates about stopped polls and polls, which are sent by the bot
     */
    public function getPoll(): ?Poll
    {
        return $this->poll;
    }

    /**
     * A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were sent by the
     * bot itself.
     */
    public function getPollAnswer(): ?PollAnswer
    {
        return $this->pollAnswer;
    }

    /**
     * The bot's chat member status was updated in a chat. For private chats, this update is received only when the bot
     * is blocked or unblocked by the user.
     */
    public function getMyChatMember(): ?ChatMemberUpdated
    {
        return $this->myChatMember;
    }

    /**
     * A chat member's status was updated in a chat. The bot must be an administrator in the chat and must explicitly
     * specify “chat\_member” in the list of *allowed\_updates* to receive these updates.
     */
    public function getChatMember(): ?ChatMemberUpdated
    {
        return $this->chatMember;
    }

    /**
     * A request to join the chat has been sent. The bot must have the *can\_invite\_users* administrator right in the
     * chat to receive these updates.
     */
    public function getChatJoinRequest(): ?ChatJoinRequest
    {
        return $this->chatJoinRequest;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['update_id']);

        $instance->message = Message::fromArray($array['message'] ?? null);
        $instance->editedMessage = Message::fromArray($array['edited_message'] ?? null);
        $instance->channelPost = Message::fromArray($array['channel_post'] ?? null);
        $instance->editedChannelPost = Message::fromArray($array['edited_channel_post'] ?? null);
        $instance->inlineQuery = InlineQuery::fromArray($array['inline_query'] ?? null);
        $instance->chosenInlineResult = ChosenInlineResult::fromArray($array['chosen_inline_result'] ?? null);
        $instance->callbackQuery = CallbackQuery::fromArray($array['callback_query'] ?? null);
        $instance->shippingQuery = ShippingQuery::fromArray($array['shipping_query'] ?? null);
        $instance->preCheckoutQuery = PreCheckoutQuery::fromArray($array['pre_checkout_query'] ?? null);
        $instance->poll = Poll::fromArray($array['poll'] ?? null);
        $instance->pollAnswer = PollAnswer::fromArray($array['poll_answer'] ?? null);
        $instance->myChatMember = ChatMemberUpdated::fromArray($array['my_chat_member'] ?? null);
        $instance->chatMember = ChatMemberUpdated::fromArray($array['chat_member'] ?? null);
        $instance->chatJoinRequest = ChatJoinRequest::fromArray($array['chat_join_request'] ?? null);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'update_id' => $this->updateId,
            'message' => $this->message,
            'edited_message' => $this->editedMessage,
            'channel_post' => $this->channelPost,
            'edited_channel_post' => $this->editedChannelPost,
            'inline_query' => $this->inlineQuery,
            'chosen_inline_result' => $this->chosenInlineResult,
            'callback_query' => $this->callbackQuery,
            'shipping_query' => $this->shippingQuery,
            'pre_checkout_query' => $this->preCheckoutQuery,
            'poll' => $this->poll,
            'poll_answer' => $this->pollAnswer,
            'my_chat_member' => $this->myChatMember,
            'chat_member' => $this->chatMember,
            'chat_join_request' => $this->chatJoinRequest,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
