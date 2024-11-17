<?php

namespace Drydev\WxWork\Internal\Checkin;

use Drydev\WxWork\Support\Http;

class CheckinClient extends Http
{
    /**
     * 获取打卡数据
     * @param array $params
     * @return array
     */
    public function getCheckinData(array $params)
    {
        return $this->post('checkin/getcheckindata', $params);
    }

    /**
     * 获取打卡规则
     * @param array $params
     * @return array
     */
    public function getCheckinOption(array $params)
    {
        return $this->post('checkin/getcheckinoption', $params);
    }

    /**
     * 获取打卡日报数据
     * @param array $params
     * @return array
     */
    public function getCheckinDayData(array $params)
    {
        return $this->post('checkin/getcheckin_daydata', $params);
    }

    /**
     * 获取打卡月报数据
     * @param array $params
     * @return array
     */
    public function getCheckinMonthData(array $params)
    {
        return $this->post('checkin/getcheckin_monthdata', $params);
    }

    /**
     * 获取打卡人员排班信息
     * @param array $params
     * @return array
     */
    public function getScheduleList(array $params)
    {
        return $this->post('checkin/getcheckinschedulist', $params);
    }

    /**
     * 为打卡人员排班
     * @param array $params
     * @return array
     */
    public function setScheduleList(array $params)
    {
        return $this->post('checkin/setcheckinschedulist', $params);
    }
} 
