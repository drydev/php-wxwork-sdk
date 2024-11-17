<?php

namespace Drydev\WxWork\Internal\Payment;

use Drydev\WxWork\Support\Http;

class PaymentClient extends Http
{
    /**
     * 向员工付款
     * @param array $params
     * @return array
     */
    public function sendWorkWxRedpack(array $params)
    {
        return $this->post('mmpaymkttransfers/send_work_wx_redpack', $params);
    }

    /**
     * 向员工付款
     * @param array $params
     * @return array
     */
    public function payWwSpTrans2Pocket(array $params)
    {
        return $this->post('mmpaymkttransfers/promotion/paywwsptrans2pocket', $params);
    }

    /**
     * 查询付款记录
     * @param array $params
     * @return array
     */
    public function queryWorkWxRedpack(array $params)
    {
        return $this->post('mmpaymkttransfers/queryworkwxredpack', $params);
    }

    /**
     * 获取企业付款银行列表
     * @return array
     */
    public function getBankList()
    {
        return $this->get('mmpaysptrans/bank/getbanklist');
    }

    /**
     * 向员工付款到银行卡
     * @param array $params
     * @return array
     */
    public function payBank(array $params)
    {
        return $this->post('mmpaysptrans/pay_bank', $params);
    }

    /**
     * 查询银行卡付款记录
     * @param array $params
     * @return array
     */
    public function queryBank(array $params)
    {
        return $this->post('mmpaysptrans/query_bank', $params);
    }
} 
