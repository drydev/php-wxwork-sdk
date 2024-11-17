<?php

namespace Drydev\WxWork\Internal\Contact\Member;

use Drydev\WxWork\Support\Http;

class Client extends Http
{
    /**
     * 创建成员
     * @param array $data
     * @return array
     */
    public function create(array $data)
    {
        return $this->post('user/create', $data);
    }

    /**
     * 更新成员
     * @param array $data
     * @return array
     */
    public function update(array $data)
    {
        return $this->post('user/update', $data);
    }

    /**
     * 删除成员
     * @param string $userid
     * @return array
     */
    public function delete(string $userid)
    {
        return $this->get('user/delete', ['userid' => $userid]);
    }

    /**
     * 批量删除成员
     * @param array $useridlist
     * @return array
     */
    public function batchDelete(array $useridlist)
    {
        return $this->post('user/batchdelete', ['useridlist' => $useridlist]);
    }

    /**
     * 获取成员
     * @param string $userid
     * @return array
     */
    public function getMember(string $userid)
    {
        return $this->get('user/get', ['userid' => $userid]);
    }

    /**
     * 获取部门成员
     * @param int $department_id
     * @param int $fetch_child
     * @return array
     */
    public function simpleList(int $department_id, int $fetch_child = 0)
    {
        return $this->get('user/simplelist', [
            'department_id' => $department_id,
            'fetch_child' => $fetch_child
        ]);
    }

    /**
     * 获取部门成员详情
     * @param int $department_id
     * @param int $fetch_child
     * @return array
     */
    public function list(int $department_id, int $fetch_child = 0)
    {
        return $this->get('user/list', [
            'department_id' => $department_id,
            'fetch_child' => $fetch_child
        ]);
    }
} 
