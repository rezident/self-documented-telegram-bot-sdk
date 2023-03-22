<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Location;
use Rezident\SelfDocumentedTelegramBotSdk\types\User;

/**
 * Represents a [result](https://core.telegram.org/bots/api#inlinequeryresult) of an inline query that was chosen by the
 * user and sent to their chat partner.
 *
 * **Note:** It is necessary to enable [inline feedback](https://core.telegram.org/bots/inline#collecting-feedback) via
 * [@BotFather](https://t.me/botfather) in order to receive these objects in updates.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#choseninlineresult
 */
class ChosenInlineResult implements FromArrayInterface, ToArrayInterface
{
    private ?Location $location = null;

    private ?string $inlineMessageId = null;

    private function __construct(private string $resultId, private User $from, private string $query)
    {
    }

    /**
     * @param string $resultId The unique identifier for the result that was chosen
     * @param User $from The user that chose the result
     * @param string $query The query that was used to obtain the result
     */
    public static function new(string $resultId, User $from, string $query): self
    {
        return new self($resultId, $from, $query);
    }

    /**
     * Sender location, only for bots that require user location
     */
    public function location(?Location $location): self
    {
        $this->location = $location;
        return $this;
    }

    /**
     * Identifier of the sent inline message. Available only if there is an
     * [inline keyboard](https://core.telegram.org/bots/api#inlinekeyboardmarkup) attached to the message. Will be also
     * received in [callback queries](https://core.telegram.org/bots/api#callbackquery) and can be used to
     * [edit](https://core.telegram.org/bots/api#updating-messages) the message.
     */
    public function inlineMessageId(?string $inlineMessageId): self
    {
        $this->inlineMessageId = $inlineMessageId;
        return $this;
    }

    /**
     * The unique identifier for the result that was chosen
     */
    public function getResultId(): ?string
    {
        return $this->resultId;
    }

    /**
     * The user that chose the result
     */
    public function getFrom(): ?User
    {
        return $this->from;
    }

    /**
     * Sender location, only for bots that require user location
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * Identifier of the sent inline message. Available only if there is an
     * [inline keyboard](https://core.telegram.org/bots/api#inlinekeyboardmarkup) attached to the message. Will be also
     * received in [callback queries](https://core.telegram.org/bots/api#callbackquery) and can be used to
     * [edit](https://core.telegram.org/bots/api#updating-messages) the message.
     */
    public function getInlineMessageId(): ?string
    {
        return $this->inlineMessageId;
    }

    /**
     * The query that was used to obtain the result
     */
    public function getQuery(): ?string
    {
        return $this->query;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['result_id'], User::fromArray($array['from']), $array['query']);

        $instance->location = Location::fromArray($array['location'] ?? null);
        $instance->inlineMessageId = $array['inline_message_id'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'result_id' => $this->resultId,
            'from' => $this->from,
            'location' => $this->location,
            'inline_message_id' => $this->inlineMessageId,
            'query' => $this->query,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
