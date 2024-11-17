<?php

namespace Drydev\WxWork\Support;

use Drydev\WxWork\Contracts\ClientInterface;
use Drydev\WxWork\Exceptions\WxWorkException;

class AccessToken
{
    protected $client;
    protected $token;
    protected $expiresAt;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function getToken(): string
    {
        if ($this->isExpired()) {
            $this->refresh();
        }

        return $this->token;
    }

    protected function isExpired(): bool
    {
        return empty($this->token) || $this->expiresAt <= time();
    }

    protected function refresh(): void
    {
        $response = $this->client->getHttpClient()->get('gettoken', [
            'query' => [
                'corpid' => $this->client->getConfig()->getCorpId(),
                'corpsecret' => $this->client->getConfig()->getSecret(),
            ],
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        if (empty($result['access_token'])) {
            throw new WxWorkException('Failed to get access token: ' . ($result['errmsg'] ?? 'Unknown error'));
        }

        $this->token = $result['access_token'];
        $this->expiresAt = time() + ($result['expires_in'] ?? 7200) - 300; // 提前5分钟过期
    }
} 
