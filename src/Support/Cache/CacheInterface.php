<?php

namespace Drydev\WxWork\Support\Cache;

interface CacheInterface
{
    public function get(string $key);
    public function set(string $key, $value, int $ttl = 7200);
    public function delete(string $key);
    public function clear();
}

