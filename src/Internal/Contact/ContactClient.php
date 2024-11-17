<?php

namespace Drydev\WxWork\Internal\Contact;

use Drydev\WxWork\Contracts\ClientInterface;
use Drydev\WxWork\Support\Http;

class ContactClient extends Http
{
    /**
     * @var ClientInterface
     */
    protected $client;

    public function __construct(ClientInterface $client)
    {
        parent::__construct($client);
        $this->client = $client;
    }

    /**
     * 获取部门管理实例
     */
    public function department()
    {
        return new Department\Client($this->client);
    }

    /**
     * 获取成员管理实例
     */
    public function member()
    {
        return new Member\Client($this->client);
    }

    /**
     * 获取标签管理实例
     */
    public function tag()
    {
        return new Tag\Client($this->client);
    }
} 
