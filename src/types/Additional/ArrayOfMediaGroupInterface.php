<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Additional;

use Rezident\SelfDocumentedTelegramBotSdk\base\ArrayOf;

/**
 * @version 6.3
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 */
abstract class ArrayOfMediaGroupInterface extends ArrayOf
{
    public function current(): MediaGroupInterface
    {
        return parent::current();
    }

    public function add(MediaGroupInterface $value): static
    {
        $this->items[] = $value;
        return $this;
    }
}
