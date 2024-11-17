<?php

namespace Drydev\WxWork\Internal\Customer\Contact;

use Drydev\WxWork\Support\Http;

class Client extends Http
{
    /**
     * 获取客户列表
     */
    public function list(string $userid)
    {
        return $this->get('externalcontact/list', ['userid' => $userid]);
    }

    /**
     * 获取客户详情
     */
    public function getCustomer(string $external_userid, string $cursor = '')
    {
        $params = ['external_userid' => $external_userid];
        if ($cursor) {
            $params['cursor'] = $cursor;
        }
        return $this->get('externalcontact/get', $params);
    }

    /**
     * 批量获取客户详情
     */
    public function batch(array $userids)
    {
        return $this->post('externalcontact/batch/get_by_user', [
            'userid_list' => $userids
        ]);
    }

    /**
     * 修改客户备注信息
     */
    public function remark(array $data)
    {
        return $this->post('externalcontact/remark', $data);
    }
} 
