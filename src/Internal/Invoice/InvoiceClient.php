<?php

namespace Drydev\WxWork\Internal\Invoice;

use Drydev\WxWork\Support\Http;

class InvoiceClient extends Http
{
    /**
     * 查询电子发票
     * @param array $params
     * @return array
     */
    public function getInvoiceInfo(array $params)
    {
        return $this->post('invoice/getinvoiceinfo', $params);
    }

    /**
     * 批量查询电子发票
     * @param array $params
     * @return array
     */
    public function getBatchInvoiceInfo(array $params)
    {
        return $this->post('invoice/get_batch_invoice_info', $params);
    }

    /**
     * 更新发票状态
     * @param array $params
     * @return array
     */
    public function updateInvoiceStatus(array $params)
    {
        return $this->post('invoice/update_invoice_status', $params);
    }

    /**
     * 批量更新发票状态
     * @param array $params
     * @return array
     */
    public function updateStatusBatch(array $params)
    {
        return $this->post('invoice/update_status_batch', $params);
    }

    /**
     * 查询已激活的发票
     * @param array $params
     * @return array
     */
    public function getInvoiceInfoBatch(array $params)
    {
        return $this->post('invoice/getinvoiceinfobatch', $params);
    }
} 
