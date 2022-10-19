<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineKeyboardMarkup;
use Rezident\SelfDocumentedTelegramBotSdk\types\Message;

/**
 * Use this method to edit live location messages. A location can be edited until its *live\_period* expires or editing
 * is explicitly disabled by a call to
 * [stopMessageLiveLocation](https://core.telegram.org/bots/api#stopmessagelivelocation). On success, if the edited
 * message is not an inline message, the edited [Message](https://core.telegram.org/bots/api#message) is returned,
 * otherwise *True* is returned.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#editmessagelivelocation
 */
class EditMessageLiveLocationMethod implements ToArrayInterface
{
    private int|string|null $chatId = null;

    private ?int $messageId = null;

    private ?string $inlineMessageId = null;

    private ?float $horizontalAccuracy = null;

    private ?int $heading = null;

    private ?int $proximityAlertRadius = null;

    private ?InlineKeyboardMarkup $replyMarkup = null;

    private function __construct(private float $latitude, private float $longitude)
    {
    }

    /**
     * @param float $latitude Latitude of new location
     * @param float $longitude Longitude of new location
     */
    public static function new(float $latitude, float $longitude): self
    {
        return new self($latitude, $longitude);
    }

    /**
     * Required if *inline\_message\_id* is not specified. Unique identifier for the target chat or username of the
     * target channel (in the format `@channelusername`)
     */
    public function chatId(int|string|null $chatId): self
    {
        $this->chatId = $chatId;
        return $this;
    }

    /**
     * Required if *inline\_message\_id* is not specified. Identifier of the message to edit
     */
    public function messageId(?int $messageId): self
    {
        $this->messageId = $messageId;
        return $this;
    }

    /**
     * Required if *chat\_id* and *message\_id* are not specified. Identifier of the inline message
     */
    public function inlineMessageId(?string $inlineMessageId): self
    {
        $this->inlineMessageId = $inlineMessageId;
        return $this;
    }

    /**
     * The radius of uncertainty for the location, measured in meters; 0-1500
     */
    public function horizontalAccuracy(?float $horizontalAccuracy): self
    {
        $this->horizontalAccuracy = $horizontalAccuracy;
        return $this;
    }

    /**
     * Direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
     */
    public function heading(?int $heading): self
    {
        $this->heading = $heading;
        return $this;
    }

    /**
     * The maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1
     * and 100000 if specified.
     */
    public function proximityAlertRadius(?int $proximityAlertRadius): self
    {
        $this->proximityAlertRadius = $proximityAlertRadius;
        return $this;
    }

    /**
     * A JSON-serialized object for a new
     * [inline keyboard](https://core.telegram.org/bots#inline-keyboards-and-on-the-fly-updating).
     */
    public function replyMarkup(?InlineKeyboardMarkup $replyMarkup): self
    {
        $this->replyMarkup = $replyMarkup;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'message_id' => $this->messageId,
            'inline_message_id' => $this->inlineMessageId,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'horizontal_accuracy' => $this->horizontalAccuracy,
            'heading' => $this->heading,
            'proximity_alert_radius' => $this->proximityAlertRadius,
            'reply_markup' => $this->replyMarkup,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): Message|bool
    {
        $result = $executor->execute($this);
        return is_array($result) ? Message::fromArray($result) : $result;
    }
}
