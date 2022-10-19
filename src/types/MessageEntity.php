<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents one special entity in a text message. For example, hashtags, usernames, URLs, etc.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#messageentity
 */
class MessageEntity implements FromArrayInterface, ToArrayInterface
{
    private ?string $url = null;

    private ?User $user = null;

    private ?string $language = null;

    private ?string $customEmojiId = null;

    private function __construct(private string $type, private int $offset, private int $length)
    {
    }

    /**
     * @param string $type Type of the entity. Currently, can be “mention” (`@username`), “hashtag” (`#hashtag`),
     *                     “cashtag” (`$USD`), “bot\_command” (`/start@jobs_bot`), “url” (`https://telegram.org`),
     *                     “email” (`do-not-reply@telegram.org`), “phone\_number” (`+1-212-555-0123`), “bold” (**bold
     *                     text**), “italic” (*italic text*), “underline” (underlined text), “strikethrough”
     *                     (strikethrough text), “spoiler” (spoiler message), “code” (monowidth string), “pre”
     *                     (monowidth block), “text\_link” (for clickable text URLs), “text\_mention” (for users
     *                     [without usernames](https://telegram.org/blog/edit#new-mentions)), “custom\_emoji” (for
     *                     inline custom emoji stickers)
     * @param int $offset Offset in UTF-16 code units to the start of the entity
     * @param int $length Length of the entity in UTF-16 code units
     */
    public static function new(string $type, int $offset, int $length): self
    {
        return new self($type, $offset, $length);
    }

    /**
     * For “text\_link” only, URL that will be opened after user taps on the text
     */
    public function url(?string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * For “text\_mention” only, the mentioned user
     */
    public function user(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    /**
     * For “pre” only, the programming language of the entity text
     */
    public function language(?string $language): self
    {
        $this->language = $language;
        return $this;
    }

    /**
     * For “custom\_emoji” only, unique identifier of the custom emoji. Use
     * [getCustomEmojiStickers](https://core.telegram.org/bots/api#getcustomemojistickers) to get full information
     * about the sticker
     */
    public function customEmojiId(?string $customEmojiId): self
    {
        $this->customEmojiId = $customEmojiId;
        return $this;
    }

    /**
     * Type of the entity. Currently, can be “mention” (`@username`), “hashtag” (`#hashtag`), “cashtag” (`$USD`),
     * “bot\_command” (`/start@jobs_bot`), “url” (`https://telegram.org`), “email” (`do-not-reply@telegram.org`),
     * “phone\_number” (`+1-212-555-0123`), “bold” (**bold text**), “italic” (*italic text*), “underline” (underlined
     * text), “strikethrough” (strikethrough text), “spoiler” (spoiler message), “code” (monowidth string), “pre”
     * (monowidth block), “text\_link” (for clickable text URLs), “text\_mention” (for users
     * [without usernames](https://telegram.org/blog/edit#new-mentions)), “custom\_emoji” (for inline custom emoji
     * stickers)
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Offset in UTF-16 code units to the start of the entity
     */
    public function getOffset(): ?int
    {
        return $this->offset;
    }

    /**
     * Length of the entity in UTF-16 code units
     */
    public function getLength(): ?int
    {
        return $this->length;
    }

    /**
     * For “text\_link” only, URL that will be opened after user taps on the text
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * For “text\_mention” only, the mentioned user
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * For “pre” only, the programming language of the entity text
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * For “custom\_emoji” only, unique identifier of the custom emoji. Use
     * [getCustomEmojiStickers](https://core.telegram.org/bots/api#getcustomemojistickers) to get full information
     * about the sticker
     */
    public function getCustomEmojiId(): ?string
    {
        return $this->customEmojiId;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['type'], $array['offset'], $array['length']);

        $instance->url = $array['url'] ?? null;
        $instance->user = User::fromArray($array['user'] ?? null);
        $instance->language = $array['language'] ?? null;
        $instance->customEmojiId = $array['custom_emoji_id'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'type' => $this->type,
            'offset' => $this->offset,
            'length' => $this->length,
            'url' => $this->url,
            'user' => $this->user,
            'language' => $this->language,
            'custom_emoji_id' => $this->customEmojiId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
