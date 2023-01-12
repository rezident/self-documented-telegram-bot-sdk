<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToPlainValueInterface;

/**
 * This object represents the contents of a file to be uploaded. Must be posted using multipart/form-data in the usual
 * way that files are uploaded via the browser.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#inputfile
 */
class InputFile implements ToPlainValueInterface
{
    /**
     * @param string $path The path to the file to be uploaded
     */
    public function __construct(private string $path)
    {
    }

    public function toPlainValue(): mixed
    {
        return fopen($this->path, 'r');
    }
}
