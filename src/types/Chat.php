<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfString;

/**
 * This object represents a chat.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#chat
 */
class Chat implements FromArrayInterface, ToArrayInterface
{
    private ?string $title = null;

    private ?string $username = null;

    private ?string $firstName = null;

    private ?string $lastName = null;

    private ?bool $isForum = null;

    private ?ChatPhoto $photo = null;

    private ?ArrayOfString $activeUsernames = null;

    private ?string $emojiStatusCustomEmojiId = null;

    private ?string $bio = null;

    private ?bool $hasPrivateForwards = null;

    private ?bool $hasRestrictedVoiceAndVideoMessages = null;

    private ?bool $joinToSendMessages = null;

    private ?bool $joinByRequest = null;

    private ?string $description = null;

    private ?string $inviteLink = null;

    private ?Message $pinnedMessage = null;

    private ?ChatPermissions $permissions = null;

    private ?int $slowModeDelay = null;

    private ?int $messageAutoDeleteTime = null;

    private ?bool $hasAggressiveAntiSpamEnabled = null;

    private ?bool $hasHiddenMembers = null;

    private ?bool $hasProtectedContent = null;

    private ?string $stickerSetName = null;

    private ?bool $canSetStickerSet = null;

    private ?int $linkedChatId = null;

    private ?ChatLocation $location = null;

    private function __construct(private int $id, private string $type)
    {
    }

    /**
     * @param int $id Unique identifier for this chat. This number may have more than 32 significant bits and some
     *                programming languages may have difficulty/silent defects in interpreting it. But it has at most
     *                52 significant bits, so a signed 64-bit integer or double-precision float type are safe for
     *                storing this identifier.
     * @param string $type Type of chat, can be either “private”, “group”, “supergroup” or “channel”
     */
    public static function new(int $id, string $type): self
    {
        return new self($id, $type);
    }

    /**
     * Title, for supergroups, channels and group chats
     */
    public function title(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Username, for private chats, supergroups and channels if available
     */
    public function username(?string $username): self
    {
        $this->username = $username;
        return $this;
    }

    /**
     * First name of the other party in a private chat
     */
    public function firstName(?string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * Last name of the other party in a private chat
     */
    public function lastName(?string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * *True*, if the supergroup chat is a forum (has
     * [topics](https://telegram.org/blog/topics-in-groups-collectible-usernames#topics-in-groups) enabled)
     */
    public function isForum(?bool $isForum): self
    {
        $this->isForum = $isForum;
        return $this;
    }

    /**
     * Chat photo. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function photo(?ChatPhoto $photo): self
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * If non-empty, the list of all
     * [active chat usernames](https://telegram.org/blog/topics-in-groups-collectible-usernames#collectible-usernames);
     * for private chats, supergroups and channels. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function activeUsernames(?ArrayOfString $activeUsernames): self
    {
        $this->activeUsernames = $activeUsernames;
        return $this;
    }

    /**
     * Custom emoji identifier of emoji status of the other party in a private chat. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function emojiStatusCustomEmojiId(?string $emojiStatusCustomEmojiId): self
    {
        $this->emojiStatusCustomEmojiId = $emojiStatusCustomEmojiId;
        return $this;
    }

    /**
     * Bio of the other party in a private chat. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function bio(?string $bio): self
    {
        $this->bio = $bio;
        return $this;
    }

    /**
     * *True*, if privacy settings of the other party in the private chat allows to use `tg://user?id=<user_id>` links
     * only in chats with the user. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function hasPrivateForwards(?bool $hasPrivateForwards): self
    {
        $this->hasPrivateForwards = $hasPrivateForwards;
        return $this;
    }

    /**
     * *True*, if the privacy settings of the other party restrict sending voice and video note messages in the private
     * chat. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function hasRestrictedVoiceAndVideoMessages(?bool $hasRestrictedVoiceAndVideoMessages): self
    {
        $this->hasRestrictedVoiceAndVideoMessages = $hasRestrictedVoiceAndVideoMessages;
        return $this;
    }

    /**
     * *True*, if users need to join the supergroup before they can send messages. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function joinToSendMessages(?bool $joinToSendMessages): self
    {
        $this->joinToSendMessages = $joinToSendMessages;
        return $this;
    }

    /**
     * *True*, if all users directly joining the supergroup need to be approved by supergroup administrators. Returned
     * only in [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function joinByRequest(?bool $joinByRequest): self
    {
        $this->joinByRequest = $joinByRequest;
        return $this;
    }

    /**
     * Description, for groups, supergroups and channel chats. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function description(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Primary invite link, for groups, supergroups and channel chats. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function inviteLink(?string $inviteLink): self
    {
        $this->inviteLink = $inviteLink;
        return $this;
    }

    /**
     * The most recent pinned message (by sending date). Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function pinnedMessage(?Message $pinnedMessage): self
    {
        $this->pinnedMessage = $pinnedMessage;
        return $this;
    }

    /**
     * Default chat member permissions, for groups and supergroups. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function permissions(?ChatPermissions $permissions): self
    {
        $this->permissions = $permissions;
        return $this;
    }

    /**
     * For supergroups, the minimum allowed delay between consecutive messages sent by each unpriviledged user; in
     * seconds. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function slowModeDelay(?int $slowModeDelay): self
    {
        $this->slowModeDelay = $slowModeDelay;
        return $this;
    }

    /**
     * The time after which all messages sent to the chat will be automatically deleted; in seconds. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function messageAutoDeleteTime(?int $messageAutoDeleteTime): self
    {
        $this->messageAutoDeleteTime = $messageAutoDeleteTime;
        return $this;
    }

    /**
     * *True*, if aggressive anti-spam checks are enabled in the supergroup. The field is only available to chat
     * administrators. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function hasAggressiveAntiSpamEnabled(?bool $hasAggressiveAntiSpamEnabled): self
    {
        $this->hasAggressiveAntiSpamEnabled = $hasAggressiveAntiSpamEnabled;
        return $this;
    }

    /**
     * *True*, if non-administrators can only get the list of bots and administrators in the chat. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function hasHiddenMembers(?bool $hasHiddenMembers): self
    {
        $this->hasHiddenMembers = $hasHiddenMembers;
        return $this;
    }

    /**
     * *True*, if messages from the chat can't be forwarded to other chats. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function hasProtectedContent(?bool $hasProtectedContent): self
    {
        $this->hasProtectedContent = $hasProtectedContent;
        return $this;
    }

    /**
     * For supergroups, name of group sticker set. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function stickerSetName(?string $stickerSetName): self
    {
        $this->stickerSetName = $stickerSetName;
        return $this;
    }

    /**
     * *True*, if the bot can change the group sticker set. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function canSetStickerSet(?bool $canSetStickerSet): self
    {
        $this->canSetStickerSet = $canSetStickerSet;
        return $this;
    }

    /**
     * Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice versa; for
     * supergroups and channel chats. This identifier may be greater than 32 bits and some programming languages may
     * have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or
     * double-precision float type are safe for storing this identifier. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function linkedChatId(?int $linkedChatId): self
    {
        $this->linkedChatId = $linkedChatId;
        return $this;
    }

    /**
     * For supergroups, the location to which the supergroup is connected. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function location(?ChatLocation $location): self
    {
        $this->location = $location;
        return $this;
    }

    /**
     * Unique identifier for this chat. This number may have more than 32 significant bits and some programming
     * languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a
     * signed 64-bit integer or double-precision float type are safe for storing this identifier.
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Type of chat, can be either “private”, “group”, “supergroup” or “channel”
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Title, for supergroups, channels and group chats
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Username, for private chats, supergroups and channels if available
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * First name of the other party in a private chat
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Last name of the other party in a private chat
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * *True*, if the supergroup chat is a forum (has
     * [topics](https://telegram.org/blog/topics-in-groups-collectible-usernames#topics-in-groups) enabled)
     */
    public function getIsForum(): ?bool
    {
        return $this->isForum;
    }

    /**
     * Chat photo. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getPhoto(): ?ChatPhoto
    {
        return $this->photo;
    }

    /**
     * If non-empty, the list of all
     * [active chat usernames](https://telegram.org/blog/topics-in-groups-collectible-usernames#collectible-usernames);
     * for private chats, supergroups and channels. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getActiveUsernames(): ?ArrayOfString
    {
        return $this->activeUsernames;
    }

    /**
     * Custom emoji identifier of emoji status of the other party in a private chat. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getEmojiStatusCustomEmojiId(): ?string
    {
        return $this->emojiStatusCustomEmojiId;
    }

    /**
     * Bio of the other party in a private chat. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getBio(): ?string
    {
        return $this->bio;
    }

    /**
     * *True*, if privacy settings of the other party in the private chat allows to use `tg://user?id=<user_id>` links
     * only in chats with the user. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getHasPrivateForwards(): ?bool
    {
        return $this->hasPrivateForwards;
    }

    /**
     * *True*, if the privacy settings of the other party restrict sending voice and video note messages in the private
     * chat. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getHasRestrictedVoiceAndVideoMessages(): ?bool
    {
        return $this->hasRestrictedVoiceAndVideoMessages;
    }

    /**
     * *True*, if users need to join the supergroup before they can send messages. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getJoinToSendMessages(): ?bool
    {
        return $this->joinToSendMessages;
    }

    /**
     * *True*, if all users directly joining the supergroup need to be approved by supergroup administrators. Returned
     * only in [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getJoinByRequest(): ?bool
    {
        return $this->joinByRequest;
    }

    /**
     * Description, for groups, supergroups and channel chats. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Primary invite link, for groups, supergroups and channel chats. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getInviteLink(): ?string
    {
        return $this->inviteLink;
    }

    /**
     * The most recent pinned message (by sending date). Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getPinnedMessage(): ?Message
    {
        return $this->pinnedMessage;
    }

    /**
     * Default chat member permissions, for groups and supergroups. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getPermissions(): ?ChatPermissions
    {
        return $this->permissions;
    }

    /**
     * For supergroups, the minimum allowed delay between consecutive messages sent by each unpriviledged user; in
     * seconds. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getSlowModeDelay(): ?int
    {
        return $this->slowModeDelay;
    }

    /**
     * The time after which all messages sent to the chat will be automatically deleted; in seconds. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getMessageAutoDeleteTime(): ?int
    {
        return $this->messageAutoDeleteTime;
    }

    /**
     * *True*, if aggressive anti-spam checks are enabled in the supergroup. The field is only available to chat
     * administrators. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getHasAggressiveAntiSpamEnabled(): ?bool
    {
        return $this->hasAggressiveAntiSpamEnabled;
    }

    /**
     * *True*, if non-administrators can only get the list of bots and administrators in the chat. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getHasHiddenMembers(): ?bool
    {
        return $this->hasHiddenMembers;
    }

    /**
     * *True*, if messages from the chat can't be forwarded to other chats. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getHasProtectedContent(): ?bool
    {
        return $this->hasProtectedContent;
    }

    /**
     * For supergroups, name of group sticker set. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getStickerSetName(): ?string
    {
        return $this->stickerSetName;
    }

    /**
     * *True*, if the bot can change the group sticker set. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getCanSetStickerSet(): ?bool
    {
        return $this->canSetStickerSet;
    }

    /**
     * Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice versa; for
     * supergroups and channel chats. This identifier may be greater than 32 bits and some programming languages may
     * have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or
     * double-precision float type are safe for storing this identifier. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getLinkedChatId(): ?int
    {
        return $this->linkedChatId;
    }

    /**
     * For supergroups, the location to which the supergroup is connected. Returned only in
     * [getChat](https://core.telegram.org/bots/api#getchat).
     */
    public function getLocation(): ?ChatLocation
    {
        return $this->location;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['id'], $array['type']);

        $instance->title = $array['title'] ?? null;
        $instance->username = $array['username'] ?? null;
        $instance->firstName = $array['first_name'] ?? null;
        $instance->lastName = $array['last_name'] ?? null;
        $instance->isForum = $array['is_forum'] ?? null;
        $instance->photo = ChatPhoto::fromArray($array['photo'] ?? null);
        $instance->activeUsernames = ArrayOfString::fromArray($array['active_usernames'] ?? null);
        $instance->emojiStatusCustomEmojiId = $array['emoji_status_custom_emoji_id'] ?? null;
        $instance->bio = $array['bio'] ?? null;
        $instance->hasPrivateForwards = $array['has_private_forwards'] ?? null;
        $instance->hasRestrictedVoiceAndVideoMessages = $array['has_restricted_voice_and_video_messages'] ?? null;
        $instance->joinToSendMessages = $array['join_to_send_messages'] ?? null;
        $instance->joinByRequest = $array['join_by_request'] ?? null;
        $instance->description = $array['description'] ?? null;
        $instance->inviteLink = $array['invite_link'] ?? null;
        $instance->pinnedMessage = Message::fromArray($array['pinned_message'] ?? null);
        $instance->permissions = ChatPermissions::fromArray($array['permissions'] ?? null);
        $instance->slowModeDelay = $array['slow_mode_delay'] ?? null;
        $instance->messageAutoDeleteTime = $array['message_auto_delete_time'] ?? null;
        $instance->hasAggressiveAntiSpamEnabled = $array['has_aggressive_anti_spam_enabled'] ?? null;
        $instance->hasHiddenMembers = $array['has_hidden_members'] ?? null;
        $instance->hasProtectedContent = $array['has_protected_content'] ?? null;
        $instance->stickerSetName = $array['sticker_set_name'] ?? null;
        $instance->canSetStickerSet = $array['can_set_sticker_set'] ?? null;
        $instance->linkedChatId = $array['linked_chat_id'] ?? null;
        $instance->location = ChatLocation::fromArray($array['location'] ?? null);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'id' => $this->id,
            'type' => $this->type,
            'title' => $this->title,
            'username' => $this->username,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'is_forum' => $this->isForum,
            'photo' => $this->photo,
            'active_usernames' => $this->activeUsernames,
            'emoji_status_custom_emoji_id' => $this->emojiStatusCustomEmojiId,
            'bio' => $this->bio,
            'has_private_forwards' => $this->hasPrivateForwards,
            'has_restricted_voice_and_video_messages' => $this->hasRestrictedVoiceAndVideoMessages,
            'join_to_send_messages' => $this->joinToSendMessages,
            'join_by_request' => $this->joinByRequest,
            'description' => $this->description,
            'invite_link' => $this->inviteLink,
            'pinned_message' => $this->pinnedMessage,
            'permissions' => $this->permissions,
            'slow_mode_delay' => $this->slowModeDelay,
            'message_auto_delete_time' => $this->messageAutoDeleteTime,
            'has_aggressive_anti_spam_enabled' => $this->hasAggressiveAntiSpamEnabled,
            'has_hidden_members' => $this->hasHiddenMembers,
            'has_protected_content' => $this->hasProtectedContent,
            'sticker_set_name' => $this->stickerSetName,
            'can_set_sticker_set' => $this->canSetStickerSet,
            'linked_chat_id' => $this->linkedChatId,
            'location' => $this->location,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
