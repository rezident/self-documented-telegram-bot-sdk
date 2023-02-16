<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types\Games;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfMessageEntity;
use Rezident\SelfDocumentedTelegramBotSdk\types\Additional\ArrayOfPhotoSize;
use Rezident\SelfDocumentedTelegramBotSdk\types\Animation;

/**
 * This object represents a game. Use BotFather to create and edit games, their short names will act as unique
 * identifiers.
 *
 * @version 6.5
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#game
 */
class Game implements FromArrayInterface, ToArrayInterface
{
    private ?string $text = null;

    private ?ArrayOfMessageEntity $textEntities = null;

    private ?Animation $animation = null;

    private function __construct(private string $title, private string $description, private ArrayOfPhotoSize $photo)
    {
    }

    /**
     * @param string $title Title of the game
     * @param string $description Description of the game
     * @param ArrayOfPhotoSize $photo Photo that will be displayed in the game message in chats.
     */
    public static function new(string $title, string $description, ArrayOfPhotoSize $photo): self
    {
        return new self($title, $description, $photo);
    }

    /**
     * Brief description of the game or high scores included in the game message. Can be automatically edited to
     * include current high scores for the game when the bot calls
     * [setGameScore](https://core.telegram.org/bots/api#setgamescore), or manually edited using
     * [editMessageText](https://core.telegram.org/bots/api#editmessagetext). 0-4096 characters.
     */
    public function text(?string $text): self
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Special entities that appear in *text*, such as usernames, URLs, bot commands, etc.
     */
    public function textEntities(?ArrayOfMessageEntity $textEntities): self
    {
        $this->textEntities = $textEntities;
        return $this;
    }

    /**
     * Animation that will be displayed in the game message in chats. Upload via [BotFather](https://t.me/botfather)
     */
    public function animation(?Animation $animation): self
    {
        $this->animation = $animation;
        return $this;
    }

    /**
     * Title of the game
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Description of the game
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Photo that will be displayed in the game message in chats.
     */
    public function getPhoto(): ?ArrayOfPhotoSize
    {
        return $this->photo;
    }

    /**
     * Brief description of the game or high scores included in the game message. Can be automatically edited to
     * include current high scores for the game when the bot calls
     * [setGameScore](https://core.telegram.org/bots/api#setgamescore), or manually edited using
     * [editMessageText](https://core.telegram.org/bots/api#editmessagetext). 0-4096 characters.
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Special entities that appear in *text*, such as usernames, URLs, bot commands, etc.
     */
    public function getTextEntities(): ?ArrayOfMessageEntity
    {
        return $this->textEntities;
    }

    /**
     * Animation that will be displayed in the game message in chats. Upload via [BotFather](https://t.me/botfather)
     */
    public function getAnimation(): ?Animation
    {
        return $this->animation;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self($array['title'], $array['description'], ArrayOfPhotoSize::fromArray($array['photo']));

        $instance->text = $array['text'] ?? null;
        $instance->textEntities = ArrayOfMessageEntity::fromArray($array['text_entities'] ?? null);
        $instance->animation = Animation::fromArray($array['animation'] ?? null);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'photo' => $this->photo,
            'text' => $this->text,
            'text_entities' => $this->textEntities,
            'animation' => $this->animation,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
