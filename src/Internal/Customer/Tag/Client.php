<?php

namespace Drydev\WxWork\Internal\Customer\Tag;

use Drydev\WxWork\Support\Http;

class Client extends Http
{
    /**
     * 获取企业标签库
     */
    public function getCorpTags(array $tag_id = [], array $group_id = [])
    {
        return $this->post('externalcontact/get_corp_tag_list', [
            'tag_id' => $tag_id,
            'group_id' => $group_id
        ]);
    }

    /**
     * 添加企业客户标签
     */
    public function addCorpTag(array $params)
    {
        return $this->post('externalcontact/add_corp_tag', $params);
    }

    /**
     * 编辑企业客户标签
     */
    public function editCorpTag(array $params)
    {
        return $this->post('externalcontact/edit_corp_tag', $params);
    }

    /**
     * 删除企业客户标签
     */
    public function delCorpTag(array $tag_id = [], array $group_id = [])
    {
        return $this->post('externalcontact/del_corp_tag', [
            'tag_id' => $tag_id,
            'group_id' => $group_id
        ]);
    }

    /**
     * 标记客户企业标签
     */
    public function mark(array $params)
    {
        return $this->post('externalcontact/mark_tag', $params);
    }
} 
