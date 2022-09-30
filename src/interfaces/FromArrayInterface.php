<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\interfaces;

interface FromArrayInterface
{
    public static function fromArray(array $array): self;
}
