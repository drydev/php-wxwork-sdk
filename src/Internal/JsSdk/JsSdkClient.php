<?php

namespace Drydev\WxWork\Internal\JsSdk;

use Drydev\WxWork\Support\Http;

class JsSdkClient extends Http
{
    /**
     * 获取企业的jsapi_ticket
     */
    public function getTicket()
    {
        return $this->get('get_jsapi_ticket');
    }

    /**
     * 获取应用的jsapi_ticket
     */
    public function getAgentTicket()
    {
        return $this->get('ticket/get', ['type' => 'agent_config']);
    }

    /**
     * 计算签名
     */
    public function signature(string $ticket, string $noncestr, int $timestamp, string $url)
    {
        $string = "jsapi_ticket={$ticket}&noncestr={$noncestr}&timestamp={$timestamp}&url={$url}";
        return sha1($string);
    }

    /**
     * 获取JS-SDK配置
     */
    public function buildConfig(array $apis, string $url, bool $debug = false, bool $beta = false)
    {
        $noncestr = uniqid();
        $timestamp = time();
        $ticket = $this->getTicket()['ticket'];

        return [
            'debug' => $debug,
            'beta' => $beta,
            'jsApiList' => $apis,
            'nonceStr' => $noncestr,
            'timestamp' => $timestamp,
            'url' => $url,
            'signature' => $this->signature($ticket, $noncestr, $timestamp, $url),
            'corpid' => $this->client->getConfig()->getCorpId(),
        ];
    }
} 
