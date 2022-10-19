<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents a chat photo.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#chatphoto
 */
class ChatPhoto implements FromArrayInterface, ToArrayInterface
{
    private function __construct(
        private string $smallFileId,
        private string $smallFileUniqueId,
        private string $bigFileId,
        private string $bigFileUniqueId
    ) {
    }

    /**
     * @param string $smallFileId File identifier of small (160x160) chat photo. This file\_id can be used only for
     *                            photo download and only for as long as the photo is not changed.
     * @param string $smallFileUniqueId Unique file identifier of small (160x160) chat photo, which is supposed to be
     *                                  the same over time and for different bots. Can't be used to download or reuse
     *                                  the file.
     * @param string $bigFileId File identifier of big (640x640) chat photo. This file\_id can be used only for photo
     *                          download and only for as long as the photo is not changed.
     * @param string $bigFileUniqueId Unique file identifier of big (640x640) chat photo, which is supposed to be the
     *                                same over time and for different bots. Can't be used to download or reuse the
     *                                file.
     */
    public static function new(
        string $smallFileId,
        string $smallFileUniqueId,
        string $bigFileId,
        string $bigFileUniqueId,
    ): self {
        return new self($smallFileId, $smallFileUniqueId, $bigFileId, $bigFileUniqueId);
    }

    /**
     * File identifier of small (160x160) chat photo. This file\_id can be used only for photo download and only for as
     * long as the photo is not changed.
     */
    public function getSmallFileId(): ?string
    {
        return $this->smallFileId;
    }

    /**
     * Unique file identifier of small (160x160) chat photo, which is supposed to be the same over time and for
     * different bots. Can't be used to download or reuse the file.
     */
    public function getSmallFileUniqueId(): ?string
    {
        return $this->smallFileUniqueId;
    }

    /**
     * File identifier of big (640x640) chat photo. This file\_id can be used only for photo download and only for as
     * long as the photo is not changed.
     */
    public function getBigFileId(): ?string
    {
        return $this->bigFileId;
    }

    /**
     * Unique file identifier of big (640x640) chat photo, which is supposed to be the same over time and for different
     * bots. Can't be used to download or reuse the file.
     */
    public function getBigFileUniqueId(): ?string
    {
        return $this->bigFileUniqueId;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self(
            $array['small_file_id'],
            $array['small_file_unique_id'],
            $array['big_file_id'],
            $array['big_file_unique_id'],
        );

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'small_file_id' => $this->smallFileId,
            'small_file_unique_id' => $this->smallFileUniqueId,
            'big_file_id' => $this->bigFileId,
            'big_file_unique_id' => $this->bigFileUniqueId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
