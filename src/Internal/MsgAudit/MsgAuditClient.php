<?php

namespace Drydev\WxWork\Internal\MsgAudit;

use Drydev\WxWork\Support\Http;

class MsgAuditClient extends Http
{
    /**
     * 获取会话内容存档开启成员列表
     */
    public function getPermitUsers(array $params = [])
    {
        return $this->post('msgaudit/get_permit_user_list', $params);
    }

    /**
     * 获取会话同意情况
     */
    public function checkSingleAgree(array $params)
    {
        return $this->post('msgaudit/check_single_agree', $params);
    }

    /**
     * 获取会话内容
     */
    public function getGroupChat(array $params)
    {
        return $this->post('msgaudit/groupchat/get', $params);
    }

    /**
     * 获取会话内容存档内部群信息
     */
    public function getRoom(string $roomid)
    {
        return $this->post('msgaudit/groupchat/get_room_info', [
            'roomid' => $roomid
        ]);
    }
} 
