<?php

namespace Drydev\WxWork\Internal\Contact\Department;

use Drydev\WxWork\Support\Http;

class Client extends Http
{
    /**
     * 创建部门
     * @param array $data
     * @return array
     */
    public function create(array $data)
    {
        return $this->post('department/create', $data);
    }

    /**
     * 更新部门
     * @param array $data
     * @return array
     */
    public function update(array $data)
    {
        return $this->post('department/update', $data);
    }

    /**
     * 删除部门
     * @param int $id
     * @return array
     */
    public function delete(int $id)
    {
        return $this->get('department/delete', ['id' => $id]);
    }

    /**
     * 获取部门列表
     * @param int|null $id
     * @return array
     */
    public function list(?int $id = null)
    {
        $query = [];
        if (!is_null($id)) {
            $query['id'] = $id;
        }
        return $this->get('department/list', $query);
    }

    /**
     * 获取子部门ID列表
     * @param int $id
     * @return array
     */
    public function simpleList(int $id)
    {
        return $this->get('department/simplelist', ['id' => $id]);
    }

    /**
     * 获取部门详情
     * @param int $id
     * @return array
     */
    public function get(int $id)
    {
        return $this->get('department/get', ['id' => $id]);
    }
} 
