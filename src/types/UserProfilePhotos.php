<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfArrayOfPhotoSize;

/**
 * This object represent a user's profile pictures.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#userprofilephotos
 */
class UserProfilePhotos implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private int $totalCount, private ArrayOfArrayOfPhotoSize $photos)
    {
    }

    /**
     * @param int $totalCount Total number of profile pictures the target user has
     * @param ArrayOfArrayOfPhotoSize $photos Requested profile pictures (in up to 4 sizes each)
     */
    public static function new(int $totalCount, ArrayOfArrayOfPhotoSize $photos): self
    {
        return new self($totalCount, $photos);
    }

    /**
     * Total number of profile pictures the target user has
     */
    public function getTotalCount(): ?int
    {
        return $this->totalCount;
    }

    /**
     * Requested profile pictures (in up to 4 sizes each)
     */
    public function getPhotos(): ?ArrayOfArrayOfPhotoSize
    {
        return $this->photos;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['total_count'], ArrayOfArrayOfPhotoSize::fromArray($array['photos']));

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'total_count' => $this->totalCount,
            'photos' => $this->photos,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
