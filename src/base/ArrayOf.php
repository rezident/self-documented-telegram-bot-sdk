<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\base;

use Iterator;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

abstract class ArrayOf implements ToArrayInterface, Iterator, FromArrayInterface
{
    protected array $items = [];

    public function current(): mixed
    {
        return current($this->items);
    }

    public function next(): void
    {
        next($this->items);
    }

    public function key(): int|null|string
    {
        return key($this->items);
    }

    public function valid(): bool
    {
        return key($this->items) !== null;
    }

    public function rewind(): void
    {
        reset($this->items);
    }

    public function toArray(): array
    {
        return $this->items;
    }
}
