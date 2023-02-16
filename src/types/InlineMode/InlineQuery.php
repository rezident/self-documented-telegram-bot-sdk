<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Location;
use Rezident\SelfDocumentedTelegramBotSdk\types\User;

/**
 * This object represents an incoming inline query. When the user sends an empty query, your bot could return some
 * default or trending results.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inlinequery
 */
class InlineQuery implements FromArrayInterface, ToArrayInterface
{
    private ?string $chatType = null;

    private ?Location $location = null;

    private function __construct(private string $id, private User $from, private string $query, private string $offset)
    {
    }

    /**
     * @param string $id Unique identifier for this query
     * @param User $from Sender
     * @param string $query Text of the query (up to 256 characters)
     * @param string $offset Offset of the results to be returned, can be controlled by the bot
     */
    public static function new(string $id, User $from, string $query, string $offset): self
    {
        return new self($id, $from, $query, $offset);
    }

    /**
     * Type of the chat from which the inline query was sent. Can be either “sender” for a private chat with the inline
     * query sender, “private”, “group”, “supergroup”, or “channel”. The chat type should be always known for requests
     * sent from official clients and most third-party clients, unless the request was sent from a secret chat
     */
    public function chatType(?string $chatType): self
    {
        $this->chatType = $chatType;
        return $this;
    }

    /**
     * Sender location, only for bots that request user location
     */
    public function location(?Location $location): self
    {
        $this->location = $location;
        return $this;
    }

    /**
     * Unique identifier for this query
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sender
     */
    public function getFrom(): ?User
    {
        return $this->from;
    }

    /**
     * Text of the query (up to 256 characters)
     */
    public function getQuery(): ?string
    {
        return $this->query;
    }

    /**
     * Offset of the results to be returned, can be controlled by the bot
     */
    public function getOffset(): ?string
    {
        return $this->offset;
    }

    /**
     * Type of the chat from which the inline query was sent. Can be either “sender” for a private chat with the inline
     * query sender, “private”, “group”, “supergroup”, or “channel”. The chat type should be always known for requests
     * sent from official clients and most third-party clients, unless the request was sent from a secret chat
     */
    public function getChatType(): ?string
    {
        return $this->chatType;
    }

    /**
     * Sender location, only for bots that request user location
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['id'], User::fromArray($array['from']), $array['query'], $array['offset']);

        $instance->chatType = $array['chat_type'] ?? null;
        $instance->location = Location::fromArray($array['location'] ?? null);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'id' => $this->id,
            'from' => $this->from,
            'query' => $this->query,
            'offset' => $this->offset,
            'chat_type' => $this->chatType,
            'location' => $this->location,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
