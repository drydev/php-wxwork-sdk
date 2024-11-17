<?php

namespace Drydev\WxWork\Internal\Contact\Tag;

use Drydev\WxWork\Support\Http;

class Client extends Http
{
    /**
     * 创建标签
     * @param array $data
     * @return array
     */
    public function create(array $data)
    {
        return $this->post('tag/create', $data);
    }

    /**
     * 更新标签名字
     * @param array $data
     * @return array
     */
    public function update(array $data)
    {
        return $this->post('tag/update', $data);
    }

    /**
     * 删除标签
     * @param int $tagid
     * @return array
     */
    public function delete(int $tagid)
    {
        return $this->get('tag/delete', ['tagid' => $tagid]);
    }

    /**
     * 获取标签成员
     * @param int $tagid
     * @return array
     */
    public function getTagUsers(int $tagid)
    {
        return $this->get('tag/get', ['tagid' => $tagid]);
    }

    /**
     * 增加标签成员
     * @param array $data
     * @return array
     */
    public function addTagUsers(array $data)
    {
        return $this->post('tag/addtagusers', $data);
    }

    /**
     * 删除标签成员
     * @param array $data
     * @return array
     */
    public function delTagUsers(array $data)
    {
        return $this->post('tag/deltagusers', $data);
    }

    /**
     * 获取标签列表
     * @return array
     */
    public function list()
    {
        return $this->get('tag/list');
    }
} 
