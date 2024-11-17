<?php

namespace Drydev\WxWork\Internal\Corp;

use Drydev\WxWork\Support\Http;

class ChainClient extends Http
{
    /**
     * 获取企业上下游列表
     * @param array $params
     * @return array
     */
    public function getCorpChainList(array $params = [])
    {
        return $this->post('corpgroup/corp/list_chain', $params);
    }

    /**
     * 获取企业上下游详情
     * @param array $params
     * @return array
     */
    public function getCorpChainInfo(array $params)
    {
        return $this->post('corpgroup/corp/get_chain', $params);
    }

    /**
     * 更新企业上下游关系
     * @param array $params
     * @return array
     */
    public function updateCorpChain(array $params)
    {
        return $this->post('corpgroup/corp/update_chain', $params);
    }

    /**
     * 删除企业上下游关系
     * @param array $params
     * @return array
     */
    public function deleteCorpChain(array $params)
    {
        return $this->post('corpgroup/corp/delete_chain', $params);
    }
} 
