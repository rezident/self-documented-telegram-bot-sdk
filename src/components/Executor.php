<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\components;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface;
use ReflectionClass;
use Rezident\SelfDocumentedTelegramBotSdk\helpers\Json;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;

class Executor implements Executable
{
    private const URL_TEMPLATE = 'https://api.telegram.org/bot%s/%s';

    private ClientInterface $client;

    public function __construct(private string $token)
    {
        $this->client = new Client();
    }

    public function execute(ToArrayInterface $method): mixed
    {
        $array = $method->toArray();
        $url = sprintf(self::URL_TEMPLATE, $this->token, $this->getMethodName($method));
        $request = new Request('POST', $url, [], Json::encode($array));
        $response = $this->client->sendRequest($request);
        $responseData = Json::decode($response->getBody()->getContents());

        return $responseData['result'];
    }

    public function setClient(ClientInterface $client): void
    {
        $this->client = $client;
    }

    private function getMethodName(object $object): string
    {
        $reflectionClass = new ReflectionClass($object);

        return lcfirst(preg_replace('/Method$/', '', $reflectionClass->getShortName()));
    }
}
