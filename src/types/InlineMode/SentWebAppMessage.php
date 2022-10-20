<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Describes an inline message sent by a [Web App](https://core.telegram.org/bots/webapps) on behalf of a user.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#sentwebappmessage
 */
class SentWebAppMessage implements FromArrayInterface, ToArrayInterface
{
    private ?string $inlineMessageId = null;

    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    /**
     * Identifier of the sent inline message. Available only if there is an
     * [inline keyboard](https://core.telegram.org/bots/api#inlinekeyboardmarkup) attached to the message.
     */
    public function inlineMessageId(?string $inlineMessageId): self
    {
        $this->inlineMessageId = $inlineMessageId;
        return $this;
    }

    /**
     * Identifier of the sent inline message. Available only if there is an
     * [inline keyboard](https://core.telegram.org/bots/api#inlinekeyboardmarkup) attached to the message.
     */
    public function getInlineMessageId(): ?string
    {
        return $this->inlineMessageId;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self();

        $instance->inlineMessageId = $array['inline_message_id'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'inline_message_id' => $this->inlineMessageId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
