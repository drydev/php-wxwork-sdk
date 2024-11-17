<?php

namespace Drydev\WxWork\Internal\Customer\Statistics;

use Drydev\WxWork\Http;

class StatisticsClient extends Http
{
    /**
     * 获取「联系客户统计」数据
     */
    public function getUserBehavior(array $params)
    {
        return $this->httpPostJson('externalcontact/get_user_behavior_data', $params);
    }

    /**
     * 获取「群聊数据统计」数据
     */
    public function getGroupChat(array $params)
    {
        return $this->httpPostJson('externalcontact/groupchat/statistic', $params);
    }
} 
