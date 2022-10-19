<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a Telegram user or bot.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#user
 */
class User implements FromArrayInterface, ToArrayInterface
{
    private ?string $lastName = null;

    private ?string $username = null;

    private ?string $languageCode = null;

    private ?bool $isPremium = null;

    private ?bool $addedToAttachmentMenu = null;

    private ?bool $canJoinGroups = null;

    private ?bool $canReadAllGroupMessages = null;

    private ?bool $supportsInlineQueries = null;

    private function __construct(private int $id, private bool $isBot, private string $firstName)
    {
    }

    /**
     * @param int $id Unique identifier for this user or bot. This number may have more than 32 significant bits and
     *                some programming languages may have difficulty/silent defects in interpreting it. But it has at
     *                most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing
     *                this identifier.
     * @param bool $isBot *True*, if this user is a bot
     * @param string $firstName User's or bot's first name
     */
    public static function new(int $id, bool $isBot, string $firstName): self
    {
        return new self($id, $isBot, $firstName);
    }

    /**
     * User's or bot's last name
     */
    public function lastName(?string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * User's or bot's username
     */
    public function username(?string $username): self
    {
        $this->username = $username;
        return $this;
    }

    /**
     * [IETF language tag](https://en.wikipedia.org/wiki/IETF_language_tag) of the user's language
     */
    public function languageCode(?string $languageCode): self
    {
        $this->languageCode = $languageCode;
        return $this;
    }

    /**
     * *True*, if this user is a Telegram Premium user
     */
    public function isPremium(?bool $isPremium): self
    {
        $this->isPremium = $isPremium;
        return $this;
    }

    /**
     * *True*, if this user added the bot to the attachment menu
     */
    public function addedToAttachmentMenu(?bool $addedToAttachmentMenu): self
    {
        $this->addedToAttachmentMenu = $addedToAttachmentMenu;
        return $this;
    }

    /**
     * *True*, if the bot can be invited to groups. Returned only in [getMe](https://core.telegram.org/bots/api#getme).
     */
    public function canJoinGroups(?bool $canJoinGroups): self
    {
        $this->canJoinGroups = $canJoinGroups;
        return $this;
    }

    /**
     * *True*, if [privacy mode](https://core.telegram.org/bots#privacy-mode) is disabled for the bot. Returned only in
     * [getMe](https://core.telegram.org/bots/api#getme).
     */
    public function canReadAllGroupMessages(?bool $canReadAllGroupMessages): self
    {
        $this->canReadAllGroupMessages = $canReadAllGroupMessages;
        return $this;
    }

    /**
     * *True*, if the bot supports inline queries. Returned only in [getMe](https://core.telegram.org/bots/api#getme).
     */
    public function supportsInlineQueries(?bool $supportsInlineQueries): self
    {
        $this->supportsInlineQueries = $supportsInlineQueries;
        return $this;
    }

    /**
     * Unique identifier for this user or bot. This number may have more than 32 significant bits and some programming
     * languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a
     * 64-bit integer or double-precision float type are safe for storing this identifier.
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * *True*, if this user is a bot
     */
    public function getIsBot(): ?bool
    {
        return $this->isBot;
    }

    /**
     * User's or bot's first name
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * User's or bot's last name
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * User's or bot's username
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * [IETF language tag](https://en.wikipedia.org/wiki/IETF_language_tag) of the user's language
     */
    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    /**
     * *True*, if this user is a Telegram Premium user
     */
    public function getIsPremium(): ?bool
    {
        return $this->isPremium;
    }

    /**
     * *True*, if this user added the bot to the attachment menu
     */
    public function getAddedToAttachmentMenu(): ?bool
    {
        return $this->addedToAttachmentMenu;
    }

    /**
     * *True*, if the bot can be invited to groups. Returned only in [getMe](https://core.telegram.org/bots/api#getme).
     */
    public function getCanJoinGroups(): ?bool
    {
        return $this->canJoinGroups;
    }

    /**
     * *True*, if [privacy mode](https://core.telegram.org/bots#privacy-mode) is disabled for the bot. Returned only in
     * [getMe](https://core.telegram.org/bots/api#getme).
     */
    public function getCanReadAllGroupMessages(): ?bool
    {
        return $this->canReadAllGroupMessages;
    }

    /**
     * *True*, if the bot supports inline queries. Returned only in [getMe](https://core.telegram.org/bots/api#getme).
     */
    public function getSupportsInlineQueries(): ?bool
    {
        return $this->supportsInlineQueries;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['id'], $array['is_bot'], $array['first_name']);

        $instance->lastName = $array['last_name'] ?? null;
        $instance->username = $array['username'] ?? null;
        $instance->languageCode = $array['language_code'] ?? null;
        $instance->isPremium = $array['is_premium'] ?? null;
        $instance->addedToAttachmentMenu = $array['added_to_attachment_menu'] ?? null;
        $instance->canJoinGroups = $array['can_join_groups'] ?? null;
        $instance->canReadAllGroupMessages = $array['can_read_all_group_messages'] ?? null;
        $instance->supportsInlineQueries = $array['supports_inline_queries'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'id' => $this->id,
            'is_bot' => $this->isBot,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'username' => $this->username,
            'language_code' => $this->languageCode,
            'is_premium' => $this->isPremium,
            'added_to_attachment_menu' => $this->addedToAttachmentMenu,
            'can_join_groups' => $this->canJoinGroups,
            'can_read_all_group_messages' => $this->canReadAllGroupMessages,
            'supports_inline_queries' => $this->supportsInlineQueries,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
