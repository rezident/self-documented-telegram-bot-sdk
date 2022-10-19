<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Use this method when you need to tell the user that something is happening on the bot's side. The status is set for 5
 * seconds or less (when a message arrives from your bot, Telegram clients clear its typing status). Returns *True* on
 * success.
 *
 * > Example: The [ImageBot](https://t.me/imagebot) needs some time to process a request and upload the image. Instead
 * of sending a text message along the lines of “Retrieving image, please wait…”, the bot may use
 * [sendChatAction](https://core.telegram.org/bots/api#sendchataction) with *action* = *upload\_photo*. The user will
 * see a “sending photo” status for the bot.
 *
 * We only recommend using this method when a response from the bot will take a **noticeable** amount of time to arrive.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#sendchataction
 */
class SendChatActionMethod implements ToArrayInterface
{
    private function __construct(private int|string $chatId, private string $action)
    {
    }

    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     *                           `@channelusername`)
     * @param string $action Type of action to broadcast. Choose one, depending on what the user is about to receive:
     *                       *typing* for [text messages](https://core.telegram.org/bots/api#sendmessage),
     *                       *upload\_photo* for [photos](https://core.telegram.org/bots/api#sendphoto),
     *                       *record\_video* or *upload\_video* for
     *                       [videos](https://core.telegram.org/bots/api#sendvideo), *record\_voice* or *upload\_voice*
     *                       for [voice notes](https://core.telegram.org/bots/api#sendvoice), *upload\_document* for
     *                       [general files](https://core.telegram.org/bots/api#senddocument), *choose\_sticker* for
     *                       [stickers](https://core.telegram.org/bots/api#sendsticker), *find\_location* for
     *                       [location data](https://core.telegram.org/bots/api#sendlocation), *record\_video\_note* or
     *                       *upload\_video\_note* for [video notes](https://core.telegram.org/bots/api#sendvideonote).
     */
    public static function new(int|string $chatId, string $action): self
    {
        return new self($chatId, $action);
    }

    public function toArray(): array
    {
        $data = [
            'chat_id' => $this->chatId,
            'action' => $this->action,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
