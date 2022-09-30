<?php

namespace Rezident\SelfDocumentedTelegramBotSdk\Tests\methods;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Rezident\SelfDocumentedTelegramBotSdk\components\Executor;
use Rezident\SelfDocumentedTelegramBotSdk\helpers\Json;
use Rezident\SelfDocumentedTelegramBotSdk\methods\GetMeMethod;
use PHPUnit\Framework\TestCase;
use Rezident\SelfDocumentedTelegramBotSdk\types\User;

class GetMeMethodTest extends TestCase
{
    private const TOKEN = 'lu9chief1yaigiephee9Oogh9ziyoo8a';

    private const RESPONSE_RESULT_MOCK =
        [
            'id' => 4944223129,
            'is_bot' => true,
            'first_name' => 'TestBot',
        ];

    public function testMethod()
    {
        $executor = new Executor(self::TOKEN);
        $method = new GetMeMethod();
        $clientMock = $this->createMock(ClientInterface::class);
        $responseStreamMock = $this->createMock(StreamInterface::class);
        $responseStreamMock->expects($this->once())
            ->method('getContents')
            ->willReturn(Json::encode(['ok' => true, 'result' => self::RESPONSE_RESULT_MOCK]));
        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock->expects($this->once())
            ->method('getBody')
            ->willReturn($responseStreamMock);
        $clientMock
            ->expects($this->once())
            ->method('sendRequest')
            ->will(
                $this->returnCallback(function (RequestInterface $request) use ($responseMock) {
                    $this->assertStringEndsWith('getMe', $request->getUri());
                    $this->assertStringContainsString('api.telegram.org', $request->getUri());
                    $this->assertStringContainsString(self::TOKEN, $request->getUri());
                    $this->assertEquals([], Json::decode($request->getBody()->getContents()));

                    return $responseMock;
                })
            );
        $executor->setClient($clientMock);
        $user = $method->exec($executor);
        $this->assertInstanceOf(User::class, $user);
    }
}
