<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\interfaces;

interface Executable
{
    public function execute(ToArrayInterface $method): mixed;
}
