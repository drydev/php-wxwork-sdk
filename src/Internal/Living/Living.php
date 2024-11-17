<?php

namespace Drydev\WxWork\Internal\Living;

class Living
{
    protected $data = [
        'anchor_userid' => '',
        'theme' => '',
        'living_start' => 0,
        'living_duration' => 0,
        'description' => '',
        'type' => 0,
        'remind_time' => 0,
    ];

    /**
     * 设置主播
     */
    public function setAnchor(string $userid)
    {
        $this->data['anchor_userid'] = $userid;
        return $this;
    }

    /**
     * 设置直播主题
     */
    public function setTheme(string $theme)
    {
        $this->data['theme'] = $theme;
        return $this;
    }

    /**
     * 设置直播开始时间
     */
    public function setStartTime(int $timestamp)
    {
        $this->data['living_start'] = $timestamp;
        return $this;
    }

    /**
     * 设置直播时长
     */
    public function setDuration(int $minutes)
    {
        $this->data['living_duration'] = $minutes;
        return $this;
    }

    /**
     * 设置直播描述
     */
    public function setDescription(string $description)
    {
        $this->data['description'] = $description;
        return $this;
    }

    /**
     * 设置直播类型
     */
    public function setType(int $type)
    {
        $this->data['type'] = $type;
        return $this;
    }

    /**
     * 设置提醒时间
     */
    public function setRemindTime(int $minutes)
    {
        $this->data['remind_time'] = $minutes;
        return $this;
    }

    /**
     * 获取直播数据
     */
    public function build(): array
    {
        return $this->data;
    }
} 
