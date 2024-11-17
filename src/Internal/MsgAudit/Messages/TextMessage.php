<?php

namespace Drydev\WxWork\Internal\MsgAudit\Messages;

class TextMessage extends Message
{
    public function getContent(): string
    {
        return $this->message['text']['content'];
    }
}

// 图片消息
class ImageMessage extends Message
{
    public function getContent(): array
    {
        return [
            'md5sum' => $this->message['image']['md5sum'],
            'filesize' => $this->message['image']['filesize'],
            'sdkfileid' => $this->message['image']['sdkfileid'],
        ];
    }
}

// 语音消息
class VoiceMessage extends Message
{
    public function getContent(): array
    {
        return [
            'md5sum' => $this->message['voice']['md5sum'],
            'voice_size' => $this->message['voice']['voice_size'],
            'sdkfileid' => $this->message['voice']['sdkfileid'],
            'play_length' => $this->message['voice']['play_length'],
        ];
    }
} 
