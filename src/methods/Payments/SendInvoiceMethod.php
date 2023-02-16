<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\Payments;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfInteger;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfLabeledPrice;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineKeyboardMarkup;
use Rezident\SelfDocumentedTelegramBotSdk\types\Message;

/**
 * Use this method to send invoices. On success, the sent [Message](https://core.telegram.org/bots/api#message) is
 * returned.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#sendinvoice
 */
class SendInvoiceMethod implements ToArrayInterface
{
    private ?int $messageThreadId = null;

    private ?int $maxTipAmount = null;

    private ?ArrayOfInteger $suggestedTipAmounts = null;

    private ?string $startParameter = null;

    private ?string $providerData = null;

    private ?string $photoUrl = null;

    private ?int $photoSize = null;

    private ?int $photoWidth = null;

    private ?int $photoHeight = null;

    private ?bool $needName = null;

    private ?bool $needPhoneNumber = null;

    private ?bool $needEmail = null;

    private ?bool $needShippingAddress = null;

    private ?bool $sendPhoneNumberToProvider = null;

    private ?bool $sendEmailToProvider = null;

    private ?bool $isFlexible = null;

    private ?bool $disableNotification = null;

    private ?bool $protectContent = null;

    private ?int $replyToMessageId = null;

    private ?bool $allowSendingWithoutReply = null;

    private ?InlineKeyboardMarkup $replyMarkup = null;

    private function __construct(
        private int|string $chatId,
        private string $title,
        private string $description,
        private string $payload,
        private string $providerToken,
        private string $currency,
        private ArrayOfLabeledPrice $prices
    ) {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     *                           `@channelusername`)
     * @param string $title Product name, 1-32 characters
     * @param string $description Product description, 1-255 characters
     * @param string $payload Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for
     *                        your internal processes.
     * @param string $providerToken Payment provider token, obtained via [@BotFather](https://t.me/botfather)
     * @param string $currency Three-letter ISO 4217 currency code, see
     *                         [more on currencies](https://core.telegram.org/bots/payments#supported-currencies)
     * @param ArrayOfLabeledPrice $prices Price breakdown, a JSON-serialized list of components (e.g. product price,
     *                                    tax, discount, delivery cost, delivery tax, bonus, etc.)
     */
    public static function new(
        int|string $chatId,
        string $title,
        string $description,
        string $payload,
        string $providerToken,
        string $currency,
        ArrayOfLabeledPrice $prices,
    ): self {
        return new self($chatId, $title, $description, $payload, $providerToken, $currency, $prices);
    }

    /**
     * Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     */
    public function messageThreadId(?int $messageThreadId): self
    {
        $this->messageThreadId = $messageThreadId;
        return $this;
    }

    /**
     * The maximum accepted amount for tips in the *smallest units* of the currency (integer, **not** float/double).
     * For example, for a maximum tip of `US$ 1.45` pass `max_tip_amount = 145`. See the *exp* parameter in
     * [currencies.json](https://core.telegram.org/bots/payments/currencies.json), it shows the number of digits past
     * the decimal point for each currency (2 for the majority of currencies). Defaults to 0
     */
    public function maxTipAmount(?int $maxTipAmount): self
    {
        $this->maxTipAmount = $maxTipAmount;
        return $this;
    }

    /**
     * A JSON-serialized array of suggested amounts of tips in the *smallest units* of the currency (integer, **not**
     * float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive,
     * passed in a strictly increased order and must not exceed *max\_tip\_amount*.
     */
    public function suggestedTipAmounts(?ArrayOfInteger $suggestedTipAmounts): self
    {
        $this->suggestedTipAmounts = $suggestedTipAmounts;
        return $this;
    }

    /**
     * Unique deep-linking parameter. If left empty, **forwarded copies** of the sent message will have a *Pay* button,
     * allowing multiple users to pay directly from the forwarded message, using the same invoice. If non-empty,
     * forwarded copies of the sent message will have a *URL* button with a deep link to the bot (instead of a *Pay*
     * button), with the value used as the start parameter
     */
    public function startParameter(?string $startParameter): self
    {
        $this->startParameter = $startParameter;
        return $this;
    }

    /**
     * JSON-serialized data about the invoice, which will be shared with the payment provider. A detailed description
     * of required fields should be provided by the payment provider.
     */
    public function providerData(?string $providerData): self
    {
        $this->providerData = $providerData;
        return $this;
    }

    /**
     * URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service. People
     * like it better when they see what they are paying for.
     */
    public function photoUrl(?string $photoUrl): self
    {
        $this->photoUrl = $photoUrl;
        return $this;
    }

    /**
     * Photo size in bytes
     */
    public function photoSize(?int $photoSize): self
    {
        $this->photoSize = $photoSize;
        return $this;
    }

    /**
     * Photo width
     */
    public function photoWidth(?int $photoWidth): self
    {
        $this->photoWidth = $photoWidth;
        return $this;
    }

    /**
     * Photo height
     */
    public function photoHeight(?int $photoHeight): self
    {
        $this->photoHeight = $photoHeight;
        return $this;
    }

    /**
     * Pass *True* if you require the user's full name to complete the order
     */
    public function needName(?bool $needName): self
    {
        $this->needName = $needName;
        return $this;
    }

    /**
     * Pass *True* if you require the user's phone number to complete the order
     */
    public function needPhoneNumber(?bool $needPhoneNumber): self
    {
        $this->needPhoneNumber = $needPhoneNumber;
        return $this;
    }

    /**
     * Pass *True* if you require the user's email address to complete the order
     */
    public function needEmail(?bool $needEmail): self
    {
        $this->needEmail = $needEmail;
        return $this;
    }

    /**
     * Pass *True* if you require the user's shipping address to complete the order
     */
    public function needShippingAddress(?bool $needShippingAddress): self
    {
        $this->needShippingAddress = $needShippingAddress;
        return $this;
    }

    /**
     * Pass *True* if the user's phone number should be sent to provider
     */
    public function sendPhoneNumberToProvider(?bool $sendPhoneNumberToProvider): self
    {
        $this->sendPhoneNumberToProvider = $sendPhoneNumberToProvider;
        return $this;
    }

    /**
     * Pass *True* if the user's email address should be sent to provider
     */
    public function sendEmailToProvider(?bool $sendEmailToProvider): self
    {
        $this->sendEmailToProvider = $sendEmailToProvider;
        return $this;
    }

    /**
     * Pass *True* if the final price depends on the shipping method
     */
    public function isFlexible(?bool $isFlexible): self
    {
        $this->isFlexible = $isFlexible;
        return $this;
    }

    /**
     * Sends the message [silently](https://telegram.org/blog/channels-2-0#silent-messages). Users will receive a
     * notification with no sound.
     */
    public function disableNotification(?bool $disableNotification): self
    {
        $this->disableNotification = $disableNotification;
        return $this;
    }

    /**
     * Protects the contents of the sent message from forwarding and saving
     */
    public function protectContent(?bool $protectContent): self
    {
        $this->protectContent = $protectContent;
        return $this;
    }

    /**
     * If the message is a reply, ID of the original message
     */
    public function replyToMessageId(?int $replyToMessageId): self
    {
        $this->replyToMessageId = $replyToMessageId;
        return $this;
    }

    /**
     * Pass *True* if the message should be sent even if the specified replied-to message is not found
     */
    public function allowSendingWithoutReply(?bool $allowSendingWithoutReply): self
    {
        $this->allowSendingWithoutReply = $allowSendingWithoutReply;
        return $this;
    }

    /**
     * A JSON-serialized object for an [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards). If
     * empty, one 'Pay `total price`' button will be shown. If not empty, the first button must be a Pay button.
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
            'message_thread_id' => $this->messageThreadId,
            'title' => $this->title,
            'description' => $this->description,
            'payload' => $this->payload,
            'provider_token' => $this->providerToken,
            'currency' => $this->currency,
            'prices' => $this->prices,
            'max_tip_amount' => $this->maxTipAmount,
            'suggested_tip_amounts' => $this->suggestedTipAmounts,
            'start_parameter' => $this->startParameter,
            'provider_data' => $this->providerData,
            'photo_url' => $this->photoUrl,
            'photo_size' => $this->photoSize,
            'photo_width' => $this->photoWidth,
            'photo_height' => $this->photoHeight,
            'need_name' => $this->needName,
            'need_phone_number' => $this->needPhoneNumber,
            'need_email' => $this->needEmail,
            'need_shipping_address' => $this->needShippingAddress,
            'send_phone_number_to_provider' => $this->sendPhoneNumberToProvider,
            'send_email_to_provider' => $this->sendEmailToProvider,
            'is_flexible' => $this->isFlexible,
            'disable_notification' => $this->disableNotification,
            'protect_content' => $this->protectContent,
            'reply_to_message_id' => $this->replyToMessageId,
            'allow_sending_without_reply' => $this->allowSendingWithoutReply,
            'reply_markup' => $this->replyMarkup,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): Message
    {
        return Message::fromArray($executor->execute($this));
    }
}
