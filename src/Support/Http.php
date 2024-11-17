<?php

namespace Drydev\WxWork\Support;

use Drydev\WxWork\Contracts\ClientInterface;
use Drydev\WxWork\Exceptions\WxWorkException;
use GuzzleHttp\Exception\GuzzleException;

class Http
{
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * 发送 GET 请求
     */
    protected function get(string $uri, array $query = [])
    {
        return $this->request('GET', $uri, ['query' => $query]);
    }

    /**
     * 发送 POST 请求
     */
    protected function post(string $uri, array $data = [])
    {
        return $this->request('POST', $uri, ['json' => $data]);
    }

    /**
     * 发送请求
     */
    protected function request(string $method, string $uri, array $options = [])
    {
        try {
            // 添加 access_token
            $options['query'] = array_merge(
                $options['query'] ?? [],
                ['access_token' => $this->client->getAccessToken()]
            );

            $response = $this->client->getHttpClient()->request($method, $uri, $options);
            $result = json_decode($response->getBody()->getContents(), true);

            if (isset($result['errcode']) && $result['errcode'] != 0) {
                throw new WxWorkException($result);
            }

            return $result;
        } catch (GuzzleException $e) {
            throw new WxWorkException($e->getMessage(), $e->getCode(), $e);
        }
    }
} 
