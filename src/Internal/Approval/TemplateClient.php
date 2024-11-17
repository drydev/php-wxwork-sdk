<?php

namespace Drydev\WxWork\Internal\Approval;

use Drydev\WxWork\Support\Http;

class TemplateClient extends Http
{
    /**
     * 获取审批模板列表
     * @param array $params
     * @return array
     */
    public function getTemplateList(array $params = [])
    {
        return $this->post('oa/approval/get_template_list', $params);
    }

    /**
     * 获取分类列表
     * @return array
     */
    public function getCategoryList()
    {
        return $this->get('oa/approval/get_category_list');
    }

    /**
     * 获取审批模板详情
     * @param string $template_id
     * @return array
     */
    public function getTemplateDetail(string $template_id)
    {
        return $this->get('oa/approval/get_template_detail', [
            'template_id' => $template_id
        ]);
    }

    /**
     * 创建审批模板
     * @param array $params
     * @return array
     */
    public function createTemplate(array $params)
    {
        return $this->post('oa/approval/create_template', $params);
    }

    /**
     * 更新审批模板
     * @param array $params
     * @return array
     */
    public function updateTemplate(array $params)
    {
        return $this->post('oa/approval/update_template', $params);
    }

    /**
     * 删除审批模板
     * @param string $template_id
     * @return array
     */
    public function deleteTemplate(string $template_id)
    {
        return $this->get('oa/approval/del_template', [
            'template_id' => $template_id
        ]);
    }
} 
