<?php

namespace Drydev\WxWork\Internal\Customer\Tag;

use Drydev\WxWork\Support\Http;

class TagClient extends Http
{
    public function getCorpTags(array $tagIds = [])
    {
        return $this->post('externalcontact/get_corp_tag_list', ['tag_id' => $tagIds]);
    }

    public function deleteCorpTags(array $tagIds)
    {
        return $this->post('externalcontact/del_corp_tag', ['tag_id' => $tagIds]);
    }
} 
