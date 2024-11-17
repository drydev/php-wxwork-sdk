<?php

namespace Drydev\WxWork\Internal\Invoice;

use Drydev\WxWork\Support\Http;

class CardClient extends Http
{
    /**
     * 创建发票卡券模板
     * @param array $params
     * @return array
     */
    public function createCard(array $params)
    {
        return $this->post('invoice/createcard', $params);
    }

    /**
     * 获取发票卡券模板
     * @param string $card_id
     * @return array
     */
    public function getCard(string $card_id)
    {
        return $this->post('invoice/getcard', ['card_id' => $card_id]);
    }

    /**
     * 批量获取发票卡券模板
     * @param array $params
     * @return array
     */
    public function listCard(array $params)
    {
        return $this->post('invoice/listcard', $params);
    }

    /**
     * 更新发票卡券模板
     * @param array $params
     * @return array
     */
    public function updateCard(array $params)
    {
        return $this->post('invoice/updatecard', $params);
    }

    /**
     * 删除发票卡券模板
     * @param string $card_id
     * @return array
     */
    public function deleteCard(string $card_id)
    {
        return $this->post('invoice/deletecard', ['card_id' => $card_id]);
    }
} 
