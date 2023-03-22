<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfMessageEntity;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfString;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ReplyMarkup;
use Rezident\SelfDocumentedTelegramBotSdk\types\Message;

/**
 * Use this method to send a native poll. On success, the sent [Message](https://core.telegram.org/bots/api#message) is
 * returned.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#sendpoll
 */
class SendPollMethod implements ToArrayInterface
{
    private ?int $messageThreadId = null;

    private ?bool $isAnonymous = null;

    private ?string $type = null;

    private ?bool $allowsMultipleAnswers = null;

    private ?int $correctOptionId = null;

    private ?string $explanation = null;

    private ?string $explanationParseMode = null;

    private ?ArrayOfMessageEntity $explanationEntities = null;

    private ?int $openPeriod = null;

    private ?int $closeDate = null;

    private ?bool $isClosed = null;

    private ?bool $disableNotification = null;

    private ?bool $protectContent = null;

    private ?int $replyToMessageId = null;

    private ?bool $allowSendingWithoutReply = null;

    private ?ReplyMarkup $replyMarkup = null;

    private function __construct(private int|string $chatId, private string $question, private ArrayOfString $options)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     *                           `@channelusername`)
     * @param string $question Poll question, 1-300 characters
     * @param ArrayOfString $options A JSON-serialized list of answer options, 2-10 strings 1-100 characters each
     */
    public static function new(int|string $chatId, string $question, ArrayOfString $options): self
    {
        return new self($chatId, $question, $options);
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
     * *True*, if the poll needs to be anonymous, defaults to *True*
     */
    public function isAnonymous(?bool $isAnonymous): self
    {
        $this->isAnonymous = $isAnonymous;
        return $this;
    }

    /**
     * Poll type, “quiz” or “regular”, defaults to “regular”
     */
    public function type(?string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * *True*, if the poll allows multiple answers, ignored for polls in quiz mode, defaults to *False*
     */
    public function allowsMultipleAnswers(?bool $allowsMultipleAnswers): self
    {
        $this->allowsMultipleAnswers = $allowsMultipleAnswers;
        return $this;
    }

    /**
     * 0-based identifier of the correct answer option, required for polls in quiz mode
     */
    public function correctOptionId(?int $correctOptionId): self
    {
        $this->correctOptionId = $correctOptionId;
        return $this;
    }

    /**
     * Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200
     * characters with at most 2 line feeds after entities parsing
     */
    public function explanation(?string $explanation): self
    {
        $this->explanation = $explanation;
        return $this;
    }

    /**
     * Mode for parsing entities in the explanation. See
     * [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details.
     */
    public function explanationParseMode(?string $explanationParseMode): self
    {
        $this->explanationParseMode = $explanationParseMode;
        return $this;
    }

    /**
     * A JSON-serialized list of special entities that appear in the poll explanation, which can be specified instead
     * of *parse\_mode*
     */
    public function explanationEntities(?ArrayOfMessageEntity $explanationEntities): self
    {
        $this->explanationEntities = $explanationEntities;
        return $this;
    }

    /**
     * Amount of time in seconds the poll will be active after creation, 5-600. Can't be used together with
     * *close\_date*.
     */
    public function openPeriod(?int $openPeriod): self
    {
        $this->openPeriod = $openPeriod;
        return $this;
    }

    /**
     * Point in time (Unix timestamp) when the poll will be automatically closed. Must be at least 5 and no more than
     * 600 seconds in the future. Can't be used together with *open\_period*.
     */
    public function closeDate(?int $closeDate): self
    {
        $this->closeDate = $closeDate;
        return $this;
    }

    /**
     * Pass *True* if the poll needs to be immediately closed. This can be useful for poll preview.
     */
    public function isClosed(?bool $isClosed): self
    {
        $this->isClosed = $isClosed;
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
     * Additional interface options. A JSON-serialized object for an
     * [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards),
     * [custom reply keyboard](https://core.telegram.org/bots/features#keyboards), instructions to remove reply
     * keyboard or to force a reply from the user.
     */
    public function replyMarkup(?ReplyMarkup $replyMarkup): self
    {
        $this->replyMarkup = $replyMarkup;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'message_thread_id' => $this->messageThreadId,
            'question' => $this->question,
            'options' => $this->options,
            'is_anonymous' => $this->isAnonymous,
            'type' => $this->type,
            'allows_multiple_answers' => $this->allowsMultipleAnswers,
            'correct_option_id' => $this->correctOptionId,
            'explanation' => $this->explanation,
            'explanation_parse_mode' => $this->explanationParseMode,
            'explanation_entities' => $this->explanationEntities,
            'open_period' => $this->openPeriod,
            'close_date' => $this->closeDate,
            'is_closed' => $this->isClosed,
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
