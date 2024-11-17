<?php

namespace Drydev\WxWork\Support;

class Config
{
    protected $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function get(string $key, $default = null)
    {
        return $this->config[$key] ?? $default;
    }

    public function getCorpId(): string
    {
        return $this->get('corp_id');
    }

    public function getSecret(): string
    {
        return $this->get('secret');
    }

    public function getAgentId(): int
    {
        return (int) $this->get('agent_id', 0);
    }
} 
