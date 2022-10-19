<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfMessageEntity;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfPollOption;

/**
 * This object contains information about a poll.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#poll
 */
class Poll implements FromArrayInterface, ToArrayInterface
{
    private ?int $correctOptionId = null;

    private ?string $explanation = null;

    private ?ArrayOfMessageEntity $explanationEntities = null;

    private ?int $openPeriod = null;

    private ?int $closeDate = null;

    private function __construct(
        private string $id,
        private string $question,
        private ArrayOfPollOption $options,
        private int $totalVoterCount,
        private bool $isClosed,
        private bool $isAnonymous,
        private string $type,
        private bool $allowsMultipleAnswers
    ) {
    }

    /**
     * @param string $id Unique poll identifier
     * @param string $question Poll question, 1-300 characters
     * @param ArrayOfPollOption $options List of poll options
     * @param int $totalVoterCount Total number of users that voted in the poll
     * @param bool $isClosed *True*, if the poll is closed
     * @param bool $isAnonymous *True*, if the poll is anonymous
     * @param string $type Poll type, currently can be “regular” or “quiz”
     * @param bool $allowsMultipleAnswers *True*, if the poll allows multiple answers
     */
    public static function new(
        string $id,
        string $question,
        ArrayOfPollOption $options,
        int $totalVoterCount,
        bool $isClosed,
        bool $isAnonymous,
        string $type,
        bool $allowsMultipleAnswers,
    ): self {
        return new self(
            $id,
            $question,
            $options,
            $totalVoterCount,
            $isClosed,
            $isAnonymous,
            $type,
            $allowsMultipleAnswers,
        );
    }

    /**
     * 0-based identifier of the correct answer option. Available only for polls in the quiz mode, which are closed, or
     * was sent (not forwarded) by the bot or to the private chat with the bot.
     */
    public function correctOptionId(?int $correctOptionId): self
    {
        $this->correctOptionId = $correctOptionId;
        return $this;
    }

    /**
     * Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200
     * characters
     */
    public function explanation(?string $explanation): self
    {
        $this->explanation = $explanation;
        return $this;
    }

    /**
     * Special entities like usernames, URLs, bot commands, etc. that appear in the *explanation*
     */
    public function explanationEntities(?ArrayOfMessageEntity $explanationEntities): self
    {
        $this->explanationEntities = $explanationEntities;
        return $this;
    }

    /**
     * Amount of time in seconds the poll will be active after creation
     */
    public function openPeriod(?int $openPeriod): self
    {
        $this->openPeriod = $openPeriod;
        return $this;
    }

    /**
     * Point in time (Unix timestamp) when the poll will be automatically closed
     */
    public function closeDate(?int $closeDate): self
    {
        $this->closeDate = $closeDate;
        return $this;
    }

    /**
     * Unique poll identifier
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Poll question, 1-300 characters
     */
    public function getQuestion(): ?string
    {
        return $this->question;
    }

    /**
     * List of poll options
     */
    public function getOptions(): ?ArrayOfPollOption
    {
        return $this->options;
    }

    /**
     * Total number of users that voted in the poll
     */
    public function getTotalVoterCount(): ?int
    {
        return $this->totalVoterCount;
    }

    /**
     * *True*, if the poll is closed
     */
    public function getIsClosed(): ?bool
    {
        return $this->isClosed;
    }

    /**
     * *True*, if the poll is anonymous
     */
    public function getIsAnonymous(): ?bool
    {
        return $this->isAnonymous;
    }

    /**
     * Poll type, currently can be “regular” or “quiz”
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * *True*, if the poll allows multiple answers
     */
    public function getAllowsMultipleAnswers(): ?bool
    {
        return $this->allowsMultipleAnswers;
    }

    /**
     * 0-based identifier of the correct answer option. Available only for polls in the quiz mode, which are closed, or
     * was sent (not forwarded) by the bot or to the private chat with the bot.
     */
    public function getCorrectOptionId(): ?int
    {
        return $this->correctOptionId;
    }

    /**
     * Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200
     * characters
     */
    public function getExplanation(): ?string
    {
        return $this->explanation;
    }

    /**
     * Special entities like usernames, URLs, bot commands, etc. that appear in the *explanation*
     */
    public function getExplanationEntities(): ?ArrayOfMessageEntity
    {
        return $this->explanationEntities;
    }

    /**
     * Amount of time in seconds the poll will be active after creation
     */
    public function getOpenPeriod(): ?int
    {
        return $this->openPeriod;
    }

    /**
     * Point in time (Unix timestamp) when the poll will be automatically closed
     */
    public function getCloseDate(): ?int
    {
        return $this->closeDate;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self(
            $array['id'],
            $array['question'],
            ArrayOfPollOption::fromArray($array['options']),
            $array['total_voter_count'],
            $array['is_closed'],
            $array['is_anonymous'],
            $array['type'],
            $array['allows_multiple_answers'],
        );

        $instance->correctOptionId = $array['correct_option_id'] ?? null;
        $instance->explanation = $array['explanation'] ?? null;
        $instance->explanationEntities = ArrayOfMessageEntity::fromArray($array['explanation_entities'] ?? null);
        $instance->openPeriod = $array['open_period'] ?? null;
        $instance->closeDate = $array['close_date'] ?? null;

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'id' => $this->id,
            'question' => $this->question,
            'options' => $this->options,
            'total_voter_count' => $this->totalVoterCount,
            'is_closed' => $this->isClosed,
            'is_anonymous' => $this->isAnonymous,
            'type' => $this->type,
            'allows_multiple_answers' => $this->allowsMultipleAnswers,
            'correct_option_id' => $this->correctOptionId,
            'explanation' => $this->explanation,
            'explanation_entities' => $this->explanationEntities,
            'open_period' => $this->openPeriod,
            'close_date' => $this->closeDate,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
