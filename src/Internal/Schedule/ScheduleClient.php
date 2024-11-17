<?php

namespace Drydev\WxWork\Internal\Schedule;

use Drydev\WxWork\Support\Http;

class ScheduleClient extends Http
{
    /**
     * 创建日程
     */
    public function add(array $schedule)
    {
        return $this->post('oa/schedule/add', $schedule);
    }

    /**
     * 更新日程
     */
    public function update(array $schedule)
    {
        return $this->post('oa/schedule/update', $schedule);
    }

    /**
     * 获取日程详情
     */
    public function getSchedule(string $scheduleId)
    {
        return $this->get('oa/schedule/get', ['schedule_id' => $scheduleId]);
    }

    /**
     * 取消日程
     */
    public function deleteSchedule(string $scheduleId)
    {
        return $this->post('oa/schedule/del', ['schedule_id' => $scheduleId]);
    }

    /**
     * 获取日历下的日程列表
     */
    public function getByCalendar(array $params)
    {
        return $this->post('oa/schedule/get_by_calendar', $params);
    }
}

