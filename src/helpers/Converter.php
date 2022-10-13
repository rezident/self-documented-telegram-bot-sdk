<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\helpers;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToPlainValueInterface;

class Converter
{
    public static function encode(mixed $data): string
    {
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public static function toMultipart(ToArrayInterface $object, string $prefix = ''): ?array
    {
        $result = [];
        foreach ($object->toArray() as $key => $value) {
            $fieldName = $prefix ? sprintf('%s[%s]', $prefix, $key) : $key;
            if ($value instanceof ToArrayInterface) {
                $result = array_merge($result, self::toMultipart($value, $fieldName));
            } else {
                $result[] = [
                    'name' => $fieldName,
                    'contents' => $value instanceof ToPlainValueInterface ? $value->toPlainValue() : $value,
                ];
            }
        }

        return count($result) ? $result : null;
    }

    public static function fromJson(string $data): mixed
    {
        return json_decode($data, true);
    }
}
