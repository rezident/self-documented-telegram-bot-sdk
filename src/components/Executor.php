<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\components;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use ReflectionClass;
use Rezident\SelfDocumentedTelegramBotSdk\helpers\Converter;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\Executable;
use Rezident\SelfDocumentedTelegramBotSdk\interfaces\ToArrayInterface;

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
        $url = sprintf(self::URL_TEMPLATE, $this->token, $this->getMethodName($method));
        $request = new Request('POST', $url);

        $response = $this->client->send($request, ['multipart' => Converter::toMultipart($method)]);
        $responseData = Converter::fromJson($response->getBody()->getContents());

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
