<?php

namespace Drydev\WxWork\Internal\Living;

use Drydev\WxWork\Support\Http;

class LivingClient extends Http
{
    /**
     * 创建预约直播
     */
    public function create(array $living)
    {
        return $this->post('living/create', $living);
    }

    /**
     * 修改预约直播
     */
    public function modify(array $living)
    {
        return $this->post('living/modify', $living);
    }

    /**
     * 取消预约直播
     */
    public function cancel(string $livingid)
    {
        return $this->post('living/cancel', ['livingid' => $livingid]);
    }

    /**
     * 删除直播回放
     */
    public function deleteReplayData(string $livingid)
    {
        return $this->post('living/delete_replay_data', ['livingid' => $livingid]);
    }

    /**
     * 获取直播详情
     */
    public function getLivingInfo(string $livingid)
    {
        return $this->get('living/get_living_info', ['livingid' => $livingid]);
    }

    /**
     * 获取直播观看明细
     */
    public function getWatchStat(array $params)
    {
        return $this->post('living/get_watch_stat', $params);
    }

    /**
     * 获取成员直播ID列表
     */
    public function getLivingList(array $params)
    {
        return $this->post('living/get_user_all_livingid', $params);
    }
} 
