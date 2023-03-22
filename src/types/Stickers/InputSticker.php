<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Stickers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfString;
use Rezident\SelfDocumentedTelegramBotSdk\types\InputFile;

/**
 * This object describes a sticker to be added to a sticker set.
 *
 * @version 6.6
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inputsticker
 */
class InputSticker implements FromArrayInterface, ToArrayInterface
{
    private ?MaskPosition $maskPosition = null;

    private ?ArrayOfString $keywords = null;

    private function __construct(private InputFile|string $sticker, private ArrayOfString $emojiList)
    {
    }

    /**
     * @param InputFile|string $sticker The added sticker. Pass a *file\_id* as a String to send a file that already
     *                                  exists on the Telegram servers, pass an HTTP URL as a String for Telegram to
     *                                  get a file from the Internet, upload a new one using multipart/form-data, or
     *                                  pass “attach://&lt;file\_attach\_name&gt;” to upload a new one using
     *                                  multipart/form-data under &lt;file\_attach\_name&gt; name. Animated and video
     *                                  stickers can't be uploaded via HTTP URL.
     *                                  [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files)
     * @param ArrayOfString $emojiList List of 1-20 emoji associated with the sticker
     */
    public static function new(InputFile|string $sticker, ArrayOfString $emojiList): self
    {
        return new self($sticker, $emojiList);
    }

    /**
     * Position where the mask should be placed on faces. For “mask” stickers only.
     */
    public function maskPosition(?MaskPosition $maskPosition): self
    {
        $this->maskPosition = $maskPosition;
        return $this;
    }

    /**
     * List of 0-20 search keywords for the sticker with total length of up to 64 characters. For “regular” and
     * “custom\_emoji” stickers only.
     */
    public function keywords(?ArrayOfString $keywords): self
    {
        $this->keywords = $keywords;
        return $this;
    }

    /**
     * The added sticker. Pass a *file\_id* as a String to send a file that already exists on the Telegram servers,
     * pass an HTTP URL as a String for Telegram to get a file from the Internet, upload a new one using
     * multipart/form-data, or pass “attach://&lt;file\_attach\_name&gt;” to upload a new one using multipart/form-data
     * under &lt;file\_attach\_name&gt; name. Animated and video stickers can't be uploaded via HTTP URL.
     * [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files)
     */
    public function getSticker(): InputFile|string|null
    {
        return $this->sticker;
    }

    /**
     * List of 1-20 emoji associated with the sticker
     */
    public function getEmojiList(): ?ArrayOfString
    {
        return $this->emojiList;
    }

    /**
     * Position where the mask should be placed on faces. For “mask” stickers only.
     */
    public function getMaskPosition(): ?MaskPosition
    {
        return $this->maskPosition;
    }

    /**
     * List of 0-20 search keywords for the sticker with total length of up to 64 characters. For “regular” and
     * “custom\_emoji” stickers only.
     */
    public function getKeywords(): ?ArrayOfString
    {
        return $this->keywords;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['sticker'], ArrayOfString::fromArray($array['emoji_list']));

        $instance->maskPosition = MaskPosition::fromArray($array['mask_position'] ?? null);
        $instance->keywords = ArrayOfString::fromArray($array['keywords'] ?? null);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'sticker' => $this->sticker,
            'emoji_list' => $this->emojiList,
            'mask_position' => $this->maskPosition,
            'keywords' => $this->keywords,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
