<?php

namespace Drydev\WxWork\Internal\Robot;

use Drydev\WxWork\Http;

class RobotClient extends Http
{
    /**
     * 发送机器人消息
     * @param string $key 机器人的webhook key
     * @param array $message 消息内容
     */
    public function send(string $key, array $message)
    {
        $baseUrl = 'https://qyapi.weixin.qq.com/cgi-bin/webhook/send';
        return $this->httpPostJson($baseUrl . "?key={$key}", $message);
    }
} 
