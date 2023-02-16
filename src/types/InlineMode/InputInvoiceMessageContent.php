<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfInteger;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfLabeledPrice;

/**
 * Represents the [content](https://core.telegram.org/bots/api#inputmessagecontent) of an invoice message to be sent as
 * the result of an inline query.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inputinvoicemessagecontent
 */
class InputInvoiceMessageContent implements FromArrayInterface, ToArrayInterface
{
    private ?int $maxTipAmount = null;

    private ?ArrayOfInteger $suggestedTipAmounts = null;

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

    private function __construct(
        private string $title,
        private string $description,
        private string $payload,
        private string $providerToken,
        private string $currency,
        private ArrayOfLabeledPrice $prices
    ) {
    }

    /**
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
        string $title,
        string $description,
        string $payload,
        string $providerToken,
        string $currency,
        ArrayOfLabeledPrice $prices,
    ): self {
        return new self($title, $description, $payload, $providerToken, $currency, $prices);
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
     * A JSON-serialized array of suggested amounts of tip in the *smallest units* of the currency (integer, **not**
     * float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive,
     * passed in a strictly increased order and must not exceed *max\_tip\_amount*.
     */
    public function suggestedTipAmounts(?ArrayOfInteger $suggestedTipAmounts): self
    {
        $this->suggestedTipAmounts = $suggestedTipAmounts;
        return $this;
    }

    /**
     * A JSON-serialized object for data about the invoice, which will be shared with the payment provider. A detailed
     * description of the required fields should be provided by the payment provider.
     */
    public function providerData(?string $providerData): self
    {
        $this->providerData = $providerData;
        return $this;
    }

    /**
     * URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service.
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
     * Product name, 1-32 characters
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Product description, 1-255 characters
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for your internal
     * processes.
     */
    public function getPayload(): ?string
    {
        return $this->payload;
    }

    /**
     * Payment provider token, obtained via [@BotFather](https://t.me/botfather)
     */
    public function getProviderToken(): ?string
    {
        return $this->providerToken;
    }

    /**
     * Three-letter ISO 4217 currency code, see
     * [more on currencies](https://core.telegram.org/bots/payments#supported-currencies)
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost,
     * delivery tax, bonus, etc.)
     */
    public function getPrices(): ?ArrayOfLabeledPrice
    {
        return $this->prices;
    }

    /**
     * The maximum accepted amount for tips in the *smallest units* of the currency (integer, **not** float/double).
     * For example, for a maximum tip of `US$ 1.45` pass `max_tip_amount = 145`. See the *exp* parameter in
     * [currencies.json](https://core.telegram.org/bots/payments/currencies.json), it shows the number of digits past
     * the decimal point for each currency (2 for the majority of currencies). Defaults to 0
     */
    public function getMaxTipAmount(): ?int
    {
        return $this->maxTipAmount;
    }

    /**
     * A JSON-serialized array of suggested amounts of tip in the *smallest units* of the currency (integer, **not**
     * float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive,
     * passed in a strictly increased order and must not exceed *max\_tip\_amount*.
     */
    public function getSuggestedTipAmounts(): ?ArrayOfInteger
    {
        return $this->suggestedTipAmounts;
    }

    /**
     * A JSON-serialized object for data about the invoice, which will be shared with the payment provider. A detailed
     * description of the required fields should be provided by the payment provider.
     */
    public function getProviderData(): ?string
    {
        return $this->providerData;
    }

    /**
     * URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service.
     */
    public function getPhotoUrl(): ?string
    {
        return $this->photoUrl;
    }

    /**
     * Photo size in bytes
     */
    public function getPhotoSize(): ?int
    {
        return $this->photoSize;
    }

    /**
     * Photo width
     */
    public function getPhotoWidth(): ?int
    {
        return $this->photoWidth;
    }

    /**
     * Photo height
     */
    public function getPhotoHeight(): ?int
    {
        return $this->photoHeight;
    }

    /**
     * Pass *True* if you require the user's full name to complete the order
     */
    public function getNeedName(): ?bool
    {
        return $this->needName;
    }

    /**
     * Pass *True* if you require the user's phone number to complete the order
     */
    public function getNeedPhoneNumber(): ?bool
    {
        return $this->needPhoneNumber;
    }

    /**
     * Pass *True* if you require the user's email address to complete the order
     */
    public function getNeedEmail(): ?bool
    {
        return $this->needEmail;
    }

    /**
     * Pass *True* if you require the user's shipping address to complete the order
     */
    public function getNeedShippingAddress(): ?bool
    {
        return $this->needShippingAddress;
    }

    /**
     * Pass *True* if the user's phone number should be sent to provider
     */
    public function getSendPhoneNumberToProvider(): ?bool
    {
        return $this->sendPhoneNumberToProvider;
    }

    /**
     * Pass *True* if the user's email address should be sent to provider
     */
    public function getSendEmailToProvider(): ?bool
    {
        return $this->sendEmailToProvider;
    }

    /**
     * Pass *True* if the final price depends on the shipping method
     */
    public function getIsFlexible(): ?bool
    {
        return $this->isFlexible;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self(
            $array['title'],
            $array['description'],
            $array['payload'],
            $array['provider_token'],
            $array['currency'],
            ArrayOfLabeledPrice::fromArray($array['prices']),
        );

        $instance->maxTipAmount = $array['max_tip_amount'] ?? null;
        $instance->suggestedTipAmounts = ArrayOfInteger::fromArray($array['suggested_tip_amounts'] ?? null);
        $instance->providerData = $array['provider_data'] ?? null;
        $instance->photoUrl = $array['photo_url'] ?? null;
        $instance->photoSize = $array['photo_size'] ?? null;
        $instance->photoWidth = $array['photo_width'] ?? null;
        $instance->photoHeight = $array['photo_height'] ?? null;
        $instance->needName = $array['need_name'] ?? null;
        $instance->needPhoneNumber = $array['need_phone_number'] ?? null;
        $instance->needEmail = $array['need_email'] ?? null;
        $instance->needShippingAddress = $array['need_shipping_address'] ?? null;
        $instance->sendPhoneNumberToProvider = $array['send_phone_number_to_provider'] ?? null;
        $instance->sendEmailToProvider = $array['send_email_to_provider'] ?? null;
        $instance->isFlexible = $array['is_flexible'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'payload' => $this->payload,
            'provider_token' => $this->providerToken,
            'currency' => $this->currency,
            'prices' => $this->prices,
            'max_tip_amount' => $this->maxTipAmount,
            'suggested_tip_amounts' => $this->suggestedTipAmounts,
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
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
