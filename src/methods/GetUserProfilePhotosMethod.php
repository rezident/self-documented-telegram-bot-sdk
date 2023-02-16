<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\UserProfilePhotos;

/**
 * Use this method to get a list of profile pictures for a user. Returns a
 * [UserProfilePhotos](https://core.telegram.org/bots/api#userprofilephotos) object.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#getuserprofilephotos
 */
class GetUserProfilePhotosMethod implements ToArrayInterface
{
    private ?int $offset = null;

    private ?int $limit = null;

    private function __construct(private int $userId)
    {
    }

    /**
     * @param int $userId Unique identifier of the target user
     */
    public static function new(int $userId): self
    {
        return new self($userId);
    }

    /**
     * Sequential number of the first photo to be returned. By default, all photos are returned.
     */
    public function offset(?int $offset): self
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * Limits the number of photos to be retrieved. Values between 1-100 are accepted. Defaults to 100.
     */
    public function limit(?int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'user_id' => $this->userId,
            'offset' => $this->offset,
            'limit' => $this->limit,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): UserProfilePhotos
    {
        return UserProfilePhotos::fromArray($executor->execute($this));
    }
}
