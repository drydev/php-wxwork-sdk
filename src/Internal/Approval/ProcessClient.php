<?php

namespace Drydev\WxWork\Internal\Approval;

use Drydev\WxWork\Support\Http;

class ProcessClient extends Http
{
    /**
     * 审批同意
     * @param array $params
     * @return array
     */
    public function approve(array $params)
    {
        return $this->post('oa/approval/approve', $params);
    }

    /**
     * 审批驳回
     * @param array $params
     * @return array
     */
    public function reject(array $params)
    {
        return $this->post('oa/approval/reject', $params);
    }

    /**
     * 审批转交
     * @param array $params
     * @return array
     */
    public function transfer(array $params)
    {
        return $this->post('oa/approval/transfer', $params);
    }

    /**
     * 催办审批
     * @param array $params
     * @return array
     */
    public function remind(array $params)
    {
        return $this->post('oa/approval/remind', $params);
    }

    /**
     * 撤销审批申请
     * @param array $params
     * @return array
     */
    public function cancel(array $params)
    {
        return $this->post('oa/approval/cancel', $params);
    }
} 
