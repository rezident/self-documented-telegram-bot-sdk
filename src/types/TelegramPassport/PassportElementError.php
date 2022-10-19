<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\TelegramPassport;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * This object represents an error in the Telegram Passport element which was submitted that should be resolved by the
 * user. It should be one of:
 *
 * - [PassportElementErrorDataField](https://core.telegram.org/bots/api#passportelementerrordatafield)
 *
 * - [PassportElementErrorFrontSide](https://core.telegram.org/bots/api#passportelementerrorfrontside)
 *
 * - [PassportElementErrorReverseSide](https://core.telegram.org/bots/api#passportelementerrorreverseside)
 *
 * - [PassportElementErrorSelfie](https://core.telegram.org/bots/api#passportelementerrorselfie)
 *
 * - [PassportElementErrorFile](https://core.telegram.org/bots/api#passportelementerrorfile)
 *
 * - [PassportElementErrorFiles](https://core.telegram.org/bots/api#passportelementerrorfiles)
 *
 * - [PassportElementErrorTranslationFile](https://core.telegram.org/bots/api#passportelementerrortranslationfile)
 *
 * - [PassportElementErrorTranslationFiles](https://core.telegram.org/bots/api#passportelementerrortranslationfiles)
 *
 * - [PassportElementErrorUnspecified](https://core.telegram.org/bots/api#passportelementerrorunspecified)
 *
 * @version 6.2
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#passportelementerror
 */
class PassportElementError implements FromArrayInterface, ToArrayInterface
{
    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self();

        return $instance;
    }

    public function toArray(): array
    {
        return [];
    }
}
