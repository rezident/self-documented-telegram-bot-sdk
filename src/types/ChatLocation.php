<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\types;

use Rezident\SelfDocumentedTelegramBotSdk\interfaces\FromArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

/**
 * Represents a location to which a chat is connected.
 *
 * @version 6.4
 * @author Yuri Nazarenko / Rezident <m@rezident.org>
 * @link https://core.telegram.org/bots/api#chatlocation
 */
class ChatLocation implements FromArrayInterface, ToArrayInterface
{
    private function __construct(private Location $location, private string $address)
    {
    }

    /**
     * @param Location $location The location to which the supergroup is connected. Can't be a live location.
     * @param string $address Location address; 1-64 characters, as defined by the chat owner
     */
    public static function new(Location $location, string $address): self
    {
        return new self($location, $address);
    }

    /**
     * The location to which the supergroup is connected. Can't be a live location.
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * Location address; 1-64 characters, as defined by the chat owner
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    public static function fromArray(?array $array): ?self
    {
        if ($array === null) {
            return null;
        }

        $instance = new self(Location::fromArray($array['location']), $array['address']);

        return $instance;
    }

    public function toArray(): array
    {
        $data = [
            'location' => $this->location,
            'address' => $this->address,
        ];

        return array_filter($data, fn($val) => $val !== null);
    }
}
