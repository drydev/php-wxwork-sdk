<?php

namespace Drydev\WxWork\Internal\Message;

class MessageBuilder
{
    protected $message = [];

    /**
     * 设置接收人
     */
    public function to($touser = '@all', $toparty = '', $totag = '')
    {
        $this->message['touser'] = is_array($touser) ? implode('|', $touser) : $touser;
        if ($toparty) {
            $this->message['toparty'] = is_array($toparty) ? implode('|', $toparty) : $toparty;
        }
        if ($totag) {
            $this->message['totag'] = is_array($totag) ? implode('|', $totag) : $totag;
        }
        return $this;
    }

    /**
     * 发送文本消息
     */
    public function text(string $content)
    {
        $this->message['msgtype'] = 'text';
        $this->message['text'] = ['content' => $content];
        return $this;
    }

    /**
     * 发送图片消息
     */
    public function image(string $media_id)
    {
        $this->message['msgtype'] = 'image';
        $this->message['image'] = ['media_id' => $media_id];
        return $this;
    }

    /**
     * 发送语音消息
     */
    public function voice(string $media_id)
    {
        $this->message['msgtype'] = 'voice';
        $this->message['voice'] = ['media_id' => $media_id];
        return $this;
    }

    /**
     * 发送视频消息
     */
    public function video(string $media_id, string $title = '', string $description = '')
    {
        $this->message['msgtype'] = 'video';
        $this->message['video'] = [
            'media_id' => $media_id,
            'title' => $title,
            'description' => $description,
        ];
        return $this;
    }

    /**
     * 发送文件消息
     */
    public function file(string $media_id)
    {
        $this->message['msgtype'] = 'file';
        $this->message['file'] = ['media_id' => $media_id];
        return $this;
    }

    /**
     * 发送文本卡片消息
     */
    public function textcard(string $title, string $description, string $url, string $btntxt = '')
    {
        $this->message['msgtype'] = 'textcard';
        $this->message['textcard'] = [
            'title' => $title,
            'description' => $description,
            'url' => $url,
            'btntxt' => $btntxt,
        ];
        return $this;
    }

    /**
     * 发送图文消息
     */
    public function news(array $articles)
    {
        $this->message['msgtype'] = 'news';
        $this->message['news'] = ['articles' => $articles];
        return $this;
    }

    /**
     * 发送模板卡片消息
     */
    public function templateCard(array $template_card)
    {
        $this->message['msgtype'] = 'template_card';
        $this->message['template_card'] = $template_card;
        return $this;
    }

    /**
     * 设置是否保密消息
     */
    public function safe(int $safe = 0)
    {
        $this->message['safe'] = $safe;
        return $this;
    }

    /**
     * 设置是否开启重复消息检查
     */
    public function enableDuplicateCheck(int $enable = 0, int $timeout = 1800)
    {
        $this->message['enable_duplicate_check'] = $enable;
        $this->message['duplicate_check_interval'] = $timeout;
        return $this;
    }

    /**
     * 获取消息数组
     */
    public function build(): array
    {
        return array_merge($this->message, [
            'agentid' => $this->agentid ?? 0,
        ]);
    }
} 
