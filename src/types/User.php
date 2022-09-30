<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;

class User implements FromArrayInterface
{
    public function __construct(private int $id, private bool $isBot, private string $firstName)
    {
    }

    public static function fromArray(array $array): self
    {
        $instance = new static(
            $array['id'],
            $array['is_bot'],
            $array['first_name'],
        );

        return $instance;
    }
}
