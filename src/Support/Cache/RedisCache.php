<?php

namespace Drydev\WxWork\Support\Cache;

use Illuminate\Redis\Connections\Connection;

class RedisCache implements CacheInterface
{
    protected $redis;
    protected $prefix;

    public function __construct(Connection $redis, string $prefix = '')
    {
        $this->redis = $redis;
        $this->prefix = $prefix;
    }

    public function clear() { }

    public function get($key)
    {
        return $this->redis->get($this->prefix . $key);
    }

    public function set($key, $value, $ttl = null)
    {
        if ($ttl) {
            return $this->redis->setex($this->prefix . $key, $ttl, $value);
        }
        
        return $this->redis->set($this->prefix . $key, $value);
    }

    public function delete($key)
    {
        return $this->redis->del($this->prefix . $key);
    }
} 
