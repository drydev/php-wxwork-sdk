<?php

namespace Drydev\WxWork\Internal\Corp;

use Drydev\WxWork\Support\Http;

class CorpClient extends Http
{
    /**
     * 获取应用共享信息
     * @param array $params
     * @return array
     */
    public function getAppShareInfo(array $params)
    {
        return $this->post('corpgroup/corp/list_app_share_info', $params);
    }

    /**
     * 获取下级企业的access_token
     * @param array $params
     * @return array
     */
    public function getToken(array $params)
    {
        return $this->post('corpgroup/corp/gettoken', $params);
    }

    /**
     * 获取下级企业的小程序session
     * @param array $params
     * @return array
     */
    public function getMiniProgramTransferSession(array $params)
    {
        return $this->post('miniprogram/transfer_session', $params);
    }

    /**
     * 获取下级企业的成员ID
     * @param array $params
     * @return array
     */
    public function getUserid(array $params)
    {
        return $this->post('corpgroup/corp/userid/get', $params);
    }

    /**
     * 获取下级企业的成员详情
     * @param array $params
     * @return array
     */
    public function getUser(array $params)
    {
        return $this->post('corpgroup/corp/user/get', $params);
    }

    /**
     * 获取下级企业的部门列表
     * @param array $params
     * @return array
     */
    public function getDepartmentList(array $params)
    {
        return $this->post('corpgroup/corp/department/list', $params);
    }

    /**
     * 获取下级企业的部门成员
     * @param array $params
     * @return array
     */
    public function getDepartmentUserList(array $params)
    {
        return $this->post('corpgroup/corp/department/user/list', $params);
    }
} 
