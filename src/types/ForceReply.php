<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ReplyMarkup;

/**
 * Upon receiving a message with this object, Telegram clients will display a reply interface to the user (act as if the
 * user has selected the bot's message and tapped 'Reply'). This can be extremely useful if you want to create
 * user-friendly step-by-step interfaces without having to sacrifice
 * [privacy mode](https://core.telegram.org/bots/features#privacy-mode).
 *
 * > **Example:** A [poll bot](https://t.me/PollBot) for groups runs in privacy mode (only receives commands, replies to
 * its messages and mentions). There could be two ways to create a new poll:
 *
 * >
 *
 * > - Explain the user how to send a command with parameters (e.g. /newpoll question answer1 answer2). May be appealing
 * for hardcore users but lacks modern day polish.
 *
 * > - Guide the user through a step-by-step process. 'Please send me your question', 'Cool, now let's add the first
 * answer option', 'Great. Keep adding answer options, then send /done when you're ready'.
 *
 * >
 *
 * > The last option is definitely more attractive. And if you use
 * [ForceReply](https://core.telegram.org/bots/api#forcereply) in your bot's questions, it will receive the user's
 * answers even if it only receives replies, commands and mentions - without any extra work for the user.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#forcereply
 */
class ForceReply extends ReplyMarkup implements FromArrayInterface, ToArrayInterface
{
    private ?string $inputFieldPlaceholder = null;

    private ?bool $selective = null;

    private function __construct(private bool $forceReply)
    {
    }

    /**
     * @param bool $forceReply Shows reply interface to the user, as if they manually selected the bot's message and
     *                         tapped 'Reply'
     */
    public static function new(bool $forceReply): self
    {
        return new self($forceReply);
    }

    /**
     * The placeholder to be shown in the input field when the reply is active; 1-64 characters
     */
    public function inputFieldPlaceholder(?string $inputFieldPlaceholder): self
    {
        $this->inputFieldPlaceholder = $inputFieldPlaceholder;
        return $this;
    }

    /**
     * Use this parameter if you want to force reply from specific users only. Targets: 1) users that are @mentioned in
     * the *text* of the [Message](https://core.telegram.org/bots/api#message) object; 2) if the bot's message is a
     * reply (has *reply\_to\_message\_id*), sender of the original message.
     */
    public function selective(?bool $selective): self
    {
        $this->selective = $selective;
        return $this;
    }

    /**
     * Shows reply interface to the user, as if they manually selected the bot's message and tapped 'Reply'
     */
    public function getForceReply(): ?bool
    {
        return $this->forceReply;
    }

    /**
     * The placeholder to be shown in the input field when the reply is active; 1-64 characters
     */
    public function getInputFieldPlaceholder(): ?string
    {
        return $this->inputFieldPlaceholder;
    }

    /**
     * Use this parameter if you want to force reply from specific users only. Targets: 1) users that are @mentioned in
     * the *text* of the [Message](https://core.telegram.org/bots/api#message) object; 2) if the bot's message is a
     * reply (has *reply\_to\_message\_id*), sender of the original message.
     */
    public function getSelective(): ?bool
    {
        return $this->selective;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['force_reply']);

        $instance->inputFieldPlaceholder = $array['input_field_placeholder'] ?? null;
        $instance->selective = $array['selective'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'force_reply' => $this->forceReply,
            'input_field_placeholder' => $this->inputFieldPlaceholder,
            'selective' => $this->selective,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
