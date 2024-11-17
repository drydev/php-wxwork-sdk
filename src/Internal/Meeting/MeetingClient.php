<?php

namespace Drydev\WxWork\Internal\Meeting;

use Drydev\WxWork\Support\Http;

class MeetingClient extends Http
{
    /**
     * 创建会议
     * @param array $params
     * @return array
     */
    public function create(array $params)
    {
        return $this->post('meeting/create', $params);
    }

    /**
     * 修改会议
     * @param array $params
     * @return array
     */
    public function update(array $params)
    {
        return $this->post('meeting/update', $params);
    }

    /**
     * 取消会议
     * @param string $meetingid 会议ID
     * @return array
     */
    public function cancel(string $meetingid)
    {
        return $this->post('meeting/cancel', ['meetingid' => $meetingid]);
    }

    /**
     * 获取会议详情
     * @param string $meetingid 会议ID
     * @return array
     */
    public function getMeeting(string $meetingid)
    {
        return $this->post('meeting/get', ['meetingid' => $meetingid]);
    }
} 
