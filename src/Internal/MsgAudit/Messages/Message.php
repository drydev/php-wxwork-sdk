<?php

namespace Drydev\WxWork\Internal\MsgAudit\Messages;

abstract class Message
{
    protected $message;

    public function __construct(array $message)
    {
        $this->message = $message;
    }

    public function getMsgId(): string
    {
        return $this->message['msgid'];
    }

    public function getFrom(): string
    {
        return $this->message['from'];
    }

    public function getToList(): array
    {
        return $this->message['tolist'];
    }

    public function getMsgTime(): int
    {
        return $this->message['msgtime'];
    }

    abstract public function getContent();
} 
