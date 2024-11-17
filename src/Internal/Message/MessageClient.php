<?php

namespace Drydev\WxWork\Internal\Message;

use Drydev\WxWork\Contracts\ClientInterface;
use Drydev\WxWork\Support\Http;

class MessageClient extends Http
{
    protected $client;

    public function __construct(ClientInterface $client)
    {
        parent::__construct($client);
        $this->client = $client;
    }

    /**
     * 发送应用消息
     */
    public function send(array $message)
    {
        return $this->post('message/send', $message);
    }

    /**
     * 更新模版卡片消息
     */
    public function updateTemplateCard(array $message)
    {
        return $this->post('message/update_template_card', $message);
    }

    /**
     * 撤回应用消息
     */
    public function recall(string $msgid)
    {
        return $this->post('message/recall', ['msgid' => $msgid]);
    }

    /**
     * 获取消息统计结果
     */
    public function getMessageResult(string $msgId)
    {
        return $this->get('message/get_statistics', ['msg_id' => $msgId]);
    }
} 
