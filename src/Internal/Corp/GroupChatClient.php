<?php

namespace Drydev\WxWork\Internal\Corp;

use Drydev\WxWork\Support\Http;

class GroupChatClient extends Http
{
    /**
     * 获取企业互联共享群列表
     * @param array $params
     * @return array
     */
    public function getGroupChatList(array $params)
    {
        return $this->post('corpgroup/groupchat/list', $params);
    }

    /**
     * 获取企业互联共享群详情
     * @param array $params
     * @return array
     */
    public function getGroupChat(array $params)
    {
        return $this->post('corpgroup/groupchat/get', $params);
    }

    /**
     * 获取企业互联共享群成员
     * @param array $params
     * @return array
     */
    public function getGroupChatMembers(array $params)
    {
        return $this->post('corpgroup/groupchat/members/list', $params);
    }

    /**
     * 企业互联共享群发送消息
     * @param array $params
     * @return array
     */
    public function sendGroupChatMessage(array $params)
    {
        return $this->post('corpgroup/groupchat/send', $params);
    }
} 
