<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfInlineQueryResult;

/**
 * Use this method to send answers to an inline query. On success, *True* is returned.
 *
 * No more than **50** results per query are allowed.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#answerinlinequery
 */
class AnswerInlineQueryMethod implements ToArrayInterface
{
    private ?int $cacheTime = null;

    private ?bool $isPersonal = null;

    private ?string $nextOffset = null;

    private ?string $switchPmText = null;

    private ?string $switchPmParameter = null;

    private function __construct(private string $inlineQueryId, private ArrayOfInlineQueryResult $results)
    {
    }

    /**
     * @param string $inlineQueryId Unique identifier for the answered query
     * @param ArrayOfInlineQueryResult $results A JSON-serialized array of results for the inline query
     */
    public static function new(string $inlineQueryId, ArrayOfInlineQueryResult $results): self
    {
        return new self($inlineQueryId, $results);
    }

    /**
     * The maximum amount of time in seconds that the result of the inline query may be cached on the server. Defaults
     * to 300.
     */
    public function cacheTime(?int $cacheTime): self
    {
        $this->cacheTime = $cacheTime;
        return $this;
    }

    /**
     * Pass *True* if results may be cached on the server side only for the user that sent the query. By default,
     * results may be returned to any user who sends the same query
     */
    public function isPersonal(?bool $isPersonal): self
    {
        $this->isPersonal = $isPersonal;
        return $this;
    }

    /**
     * Pass the offset that a client should send in the next query with the same text to receive more results. Pass an
     * empty string if there are no more results or if you don't support pagination. Offset length can't exceed 64
     * bytes.
     */
    public function nextOffset(?string $nextOffset): self
    {
        $this->nextOffset = $nextOffset;
        return $this;
    }

    /**
     * If passed, clients will display a button with specified text that switches the user to a private chat with the
     * bot and sends the bot a start message with the parameter *switch\_pm\_parameter*
     */
    public function switchPmText(?string $switchPmText): self
    {
        $this->switchPmText = $switchPmText;
        return $this;
    }

    /**
     * [Deep-linking](https://core.telegram.org/bots/features#deep-linking) parameter for the /start message sent to
     * the bot when user presses the switch button. 1-64 characters, only `A-Z`, `a-z`, `0-9`, `_` and `-` are allowed.
     *
     * *Example:* An inline bot that sends YouTube videos can ask the user to connect the bot to their YouTube account
     * to adapt search results accordingly. To do this, it displays a 'Connect your YouTube account' button above the
     * results, or even before showing any. The user presses the button, switches to a private chat with the bot and,
     * in doing so, passes a start parameter that instructs the bot to return an OAuth link. Once done, the bot can
     * offer a [*switch\_inline*](https://core.telegram.org/bots/api#inlinekeyboardmarkup) button so that the user can
     * easily return to the chat where they wanted to use the bot's inline capabilities.
     */
    public function switchPmParameter(?string $switchPmParameter): self
    {
        $this->switchPmParameter = $switchPmParameter;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'inline_query_id' => $this->inlineQueryId,
            'results' => $this->results,
            'cache_time' => $this->cacheTime,
            'is_personal' => $this->isPersonal,
            'next_offset' => $this->nextOffset,
            'switch_pm_text' => $this->switchPmText,
            'switch_pm_parameter' => $this->switchPmParameter,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
