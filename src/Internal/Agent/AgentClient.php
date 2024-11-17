<?php

namespace Drydev\WxWork\Internal\Agent;

use Drydev\WxWork\Support\Http;

class AgentClient extends Http
{
    /**
     * 获取应用详情
     */
    public function getAgent(int $agentid = null)
    {
        $agentid = $agentid ?? $this->client->getConfig()->getAgentId();
        return $this->get('agent/get', ['agentid' => $agentid]);
    }

    /**
     * 设置应用
     */
    public function set(array $data)
    {
        return $this->post('agent/set', $data);
    }

    /**
     * 获取应用列表
     */
    public function list()
    {
        return $this->get('agent/list');
    }

    /**
     * 设置工作台自定义展示
     */
    public function setWorkbench(array $data)
    {
        return $this->post('agent/set_workbench_template', $data);
    }

    /**
     * 获取工作台自定义展示
     */
    public function getWorkbench(int $agentid = null)
    {
        $agentid = $agentid ?? $this->client->getConfig()->getAgentId();
        return $this->post('agent/get_workbench_template', ['agentid' => $agentid]);
    }
} 
