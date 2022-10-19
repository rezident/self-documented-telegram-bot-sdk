<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\methods\TelegramPassport;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfPassportElementError;

/**
 * Informs a user that some of the Telegram Passport elements they provided contains errors. The user will not be able
 * to re-submit their Passport to you until the errors are fixed (the contents of the field for which you returned the
 * error must change). Returns *True* on success.
 *
 * Use this if the data submitted by the user doesn't satisfy the standards your service requires for any reason. For
 * example, if a birthday date seems invalid, a submitted document is blurry, a scan shows evidence of tampering, etc.
 * Supply some details in the error message to make sure the user knows how to correct the issues.
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#setpassportdataerrors
 */
class SetPassportDataErrorsMethod implements ToArrayInterface
{
    private function __construct(private int $userId, private ArrayOfPassportElementError $errors)
    {
    }

    /**
     * @param int $userId User identifier
     * @param ArrayOfPassportElementError $errors A JSON-serialized array describing the errors
     */
    public static function new(int $userId, ArrayOfPassportElementError $errors): self
    {
        return new self($userId, $errors);
    }

    public function toArray(): array
    {
        $data = [
            'user_id' => $this->userId,
            'errors' => $this->errors,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }

    public function exec(Executable $executor): bool
    {
        return $executor->execute($this);
    }
}
