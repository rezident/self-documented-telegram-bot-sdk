<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\helpers;

class Json
{
    public static function encode(mixed $data): string
    {
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public static function decode(string $data): mixed
    {
        return json_decode($data, true);
    }
}
