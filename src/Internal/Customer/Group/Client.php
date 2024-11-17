<?php

namespace Drydev\WxWork\Internal\Customer\Group;

use Drydev\WxWork\Support\Http;

class Client extends Http
{
    /**
     * 获取客户群列表
     */
    public function list(array $params = [])
    {
        return $this->post('externalcontact/groupchat/list', $params);
    }

    /**
     * 获取客户群详情
     */
    public function getGroup(string $chat_id, int $need_name = 0)
    {
        return $this->post('externalcontact/groupchat/get', [
            'chat_id' => $chat_id,
            'need_name' => $need_name
        ]);
    }

    /**
     * 获取群成员统计数据
     */
    public function statistics(array $params)
    {
        return $this->post('externalcontact/groupchat/statistic', $params);
    }
} 
