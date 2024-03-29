<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineKeyboardMarkup;

/**
 * Represents a contact with a phone number. By default, this contact will be sent by the user. Alternatively, you can
 * use *input\_message\_content* to send a message with the specified content instead of the contact.
 *
 * **Note:** This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inlinequeryresultcontact
 */
class InlineQueryResultContact implements FromArrayInterface, ToArrayInterface
{
    private ?string $lastName = null;

    private ?string $vcard = null;

    private ?InlineKeyboardMarkup $replyMarkup = null;

    private ?InputMessageContent $inputMessageContent = null;

    private ?string $thumbnailUrl = null;

    private ?int $thumbnailWidth = null;

    private ?int $thumbnailHeight = null;

    private function __construct(
        private string $type,
        private string $id,
        private string $phoneNumber,
        private string $firstName
    ) {
    }

    /**
     * @param string $type Type of the result, must be *contact*
     * @param string $id Unique identifier for this result, 1-64 Bytes
     * @param string $phoneNumber Contact's phone number
     * @param string $firstName Contact's first name
     */
    public static function new(string $type, string $id, string $phoneNumber, string $firstName): self
    {
        return new self($type, $id, $phoneNumber, $firstName);
    }

    /**
     * Contact's last name
     */
    public function lastName(?string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * Additional data about the contact in the form of a [vCard](https://en.wikipedia.org/wiki/VCard), 0-2048 bytes
     */
    public function vcard(?string $vcard): self
    {
        $this->vcard = $vcard;
        return $this;
    }

    /**
     * [Inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) attached to the message
     */
    public function replyMarkup(?InlineKeyboardMarkup $replyMarkup): self
    {
        $this->replyMarkup = $replyMarkup;
        return $this;
    }

    /**
     * Content of the message to be sent instead of the contact
     */
    public function inputMessageContent(?InputMessageContent $inputMessageContent): self
    {
        $this->inputMessageContent = $inputMessageContent;
        return $this;
    }

    /**
     * Url of the thumbnail for the result
     */
    public function thumbnailUrl(?string $thumbnailUrl): self
    {
        $this->thumbnailUrl = $thumbnailUrl;
        return $this;
    }

    /**
     * Thumbnail width
     */
    public function thumbnailWidth(?int $thumbnailWidth): self
    {
        $this->thumbnailWidth = $thumbnailWidth;
        return $this;
    }

    /**
     * Thumbnail height
     */
    public function thumbnailHeight(?int $thumbnailHeight): self
    {
        $this->thumbnailHeight = $thumbnailHeight;
        return $this;
    }

    /**
     * Type of the result, must be *contact*
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Unique identifier for this result, 1-64 Bytes
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Contact's phone number
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * Contact's first name
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Contact's last name
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Additional data about the contact in the form of a [vCard](https://en.wikipedia.org/wiki/VCard), 0-2048 bytes
     */
    public function getVcard(): ?string
    {
        return $this->vcard;
    }

    /**
     * [Inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) attached to the message
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->replyMarkup;
    }

    /**
     * Content of the message to be sent instead of the contact
     */
    public function getInputMessageContent(): ?InputMessageContent
    {
        return $this->inputMessageContent;
    }

    /**
     * Url of the thumbnail for the result
     */
    public function getThumbnailUrl(): ?string
    {
        return $this->thumbnailUrl;
    }

    /**
     * Thumbnail width
     */
    public function getThumbnailWidth(): ?int
    {
        return $this->thumbnailWidth;
    }

    /**
     * Thumbnail height
     */
    public function getThumbnailHeight(): ?int
    {
        return $this->thumbnailHeight;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['type'], $array['id'], $array['phone_number'], $array['first_name']);

        $instance->lastName = $array['last_name'] ?? null;
        $instance->vcard = $array['vcard'] ?? null;
        $instance->replyMarkup = InlineKeyboardMarkup::fromArray($array['reply_markup'] ?? null);
        $instance->inputMessageContent = InputMessageContent::fromArray($array['input_message_content'] ?? null);
        $instance->thumbnailUrl = $array['thumbnail_url'] ?? null;
        $instance->thumbnailWidth = $array['thumbnail_width'] ?? null;
        $instance->thumbnailHeight = $array['thumbnail_height'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'type' => $this->type,
            'id' => $this->id,
            'phone_number' => $this->phoneNumber,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'vcard' => $this->vcard,
            'reply_markup' => $this->replyMarkup,
            'input_message_content' => $this->inputMessageContent,
            'thumbnail_url' => $this->thumbnailUrl,
            'thumbnail_width' => $this->thumbnailWidth,
            'thumbnail_height' => $this->thumbnailHeight,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
