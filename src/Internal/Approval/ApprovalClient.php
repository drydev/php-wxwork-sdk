<?php

namespace Drydev\WxWork\Internal\Approval;

use Drydev\WxWork\Support\Http;

class ApprovalClient extends Http
{
    /**
     * 获取审批模板详情
     * @param string $template_id
     * @return array
     */
    public function getTemplate(string $template_id)
    {
        return $this->post('oa/gettemplatedetail', [
            'template_id' => $template_id
        ]);
    }

    /**
     * 提交审批申请
     * @param array $params
     * @return array
     */
    public function createApproval(array $params)
    {
        return $this->post('oa/applyevent', $params);
    }

    /**
     * 批量获取审批单号
     * @param array $params
     * @return array
     */
    public function getApprovalInfo(array $params)
    {
        return $this->post('oa/getapprovalinfo', $params);
    }

    /**
     * 获取审批申请详情
     * @param string $sp_no 审批单号
     * @return array
     */
    public function getApprovalDetail(string $sp_no)
    {
        return $this->post('oa/getapprovaldetail', [
            'sp_no' => $sp_no
        ]);
    }

    /**
     * 获取审批数据（旧）
     * @param array $params
     * @return array
     */
    public function getApprovalData(array $params)
    {
        return $this->post('corp/getapprovaldata', $params);
    }

    /**
     * 复制/更新模板到企业
     * @param array $params
     * @return array
     */
    public function copyTemplate(array $params)
    {
        return $this->post('oa/approval/copytemplate', $params);
    }
} 
