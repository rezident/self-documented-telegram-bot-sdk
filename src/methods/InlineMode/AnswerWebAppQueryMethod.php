<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\InlineMode;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode\InlineQueryResult;
use Rezident\SelfDocumentedTelegramBotSdk\types\InlineMode\SentWebAppMessage;

/**
 * Use this method to set the result of an interaction with a [Web App](https://core.telegram.org/bots/webapps) and send
 * a corresponding message on behalf of the user to the chat from which the query originated. On success, a
 * [SentWebAppMessage](https://core.telegram.org/bots/api#sentwebappmessage) object is returned.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#answerwebappquery
 */
class AnswerWebAppQueryMethod implements ToArrayInterface
{
    private function __construct(private string $webAppQueryId, private InlineQueryResult $result)
    {
    }

    /**
     * @param string $webAppQueryId Unique identifier for the query to be answered
     * @param InlineQueryResult $result A JSON-serialized object describing the message to be sent
     */
    public static function new(string $webAppQueryId, InlineQueryResult $result): self
    {
        return new self($webAppQueryId, $result);
    }

    public function toArray(): array
    {
        $data = [
            'web_app_query_id' => $this->webAppQueryId,
            'result' => $this->result,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): SentWebAppMessage
    {
        return SentWebAppMessage::fromArray($executor->execute($this));
    }
}
