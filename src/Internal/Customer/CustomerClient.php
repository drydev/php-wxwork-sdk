<?php

namespace Drydev\WxWork\Internal\Customer;

use Drydev\WxWork\Contracts\ClientInterface;
use Drydev\WxWork\Support\Http;

class CustomerClient extends Http
{
    protected $client;

    public function __construct(ClientInterface $client)
    {
        parent::__construct($client);
        $this->client = $client;
    }

    /**
     * 获取客户管理实例
     */
    public function contact()
    {
        return new Contact\Client($this->client);
    }

    /**
     * 获取客户群管理实例
     */
    public function group()
    {
        return new Group\Client($this->client);
    }

    /**
     * 获取客户标签管理实例
     */
    public function tag()
    {
        return new Tag\Client($this->client);
    }

    /**
     * 获取统计管理实例
     */
    public function statistics()
    {
        return new Statistics\Client($this->client);
    }
} 
