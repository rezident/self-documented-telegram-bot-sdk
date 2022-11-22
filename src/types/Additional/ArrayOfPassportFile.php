<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;
use Rezident\SelfDocumentedTelegramBotSdk\types\TelegramPassport\PassportFile;

/**
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
class ArrayOfPassportFile extends ArrayOf
{
    public function current(): PassportFile
    {
        return parent::current();
    }

    public function add(PassportFile $value): static
    {
        $this->items[] = $value;
        return $this;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new static();
        $instance->items = array_map(fn($data) => PassportFile::fromArray($data), $array);

        return $instance;
    }
}
