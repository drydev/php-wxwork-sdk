<?php

namespace Drydev\WxWork\Contracts;

use GuzzleHttp\Client;
use Drydev\WxWork\Support\Config;

interface ClientInterface
{
    public function getHttpClient(): Client;
    public function getConfig(): Config;
    public function getAccessToken(): string;
} 
