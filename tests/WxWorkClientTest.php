<?php

namespace Drydev\WxWork\Tests;

use Drydev\WxWork\Exceptions\InvalidArgumentException;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Psr7\Response;
use Mockery;

class WxWorkClientTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(\Drydev\WxWork\WxWorkClient::class, $this->client);
    }

    public function testConstructorWithInvalidConfig()
    {
        $this->expectException(InvalidArgumentException::class);
        new \Drydev\WxWork\WxWorkClient([]);
    }

    public function testGetAccessToken()
    {
        $response = [
            'errcode' => 0,
            'errmsg' => 'ok',
            'access_token' => 'mock-token',
            'expires_in' => 7200
        ];

        $httpClient = Mockery::mock(HttpClient::class);
        $httpClient->shouldReceive('get')
            ->with('gettoken', [
                'query' => [
                    'corpid' => 'mock-corp-id',
                    'corpsecret' => 'mock-secret'
                ]
            ])
            ->once()
            ->andReturn(new Response(200, [], json_encode($response)));

        $this->client->setHttpClient($httpClient);
        
        $this->assertEquals('mock-token', $this->client->getAccessToken());
    }
}
