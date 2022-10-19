<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\File;

/**
 * Use this method to get basic information about a file and prepare it for downloading. For the moment, bots can
 * download files of up to 20MB in size. On success, a [File](https://core.telegram.org/bots/api#file) object is
 * returned. The file can then be downloaded via the link `https://api.telegram.org/file/bot<token>/<file_path>`, where
 * `<file_path>` is taken from the response. It is guaranteed that the link will be valid for at least 1 hour. When the
 * link expires, a new one can be requested by calling [getFile](https://core.telegram.org/bots/api#getfile) again.
 *
 * **Note:** This function may not preserve the original file name and MIME type. You should save the file's MIME type
 * and name (if available) when the File object is received.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#getfile
 */
class GetFileMethod implements ToArrayInterface
{
    private function __construct(private string $fileId)
    {
    }

    /**
     * @param string $fileId File identifier to get information about
     */
    public static function new(string $fileId): self
    {
        return new self($fileId);
    }

    public function toArray(): array
    {
        $data = [
            'file_id' => $this->fileId,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): File
    {
        return File::fromArray($executor->execute($this));
    }
}
