<?php

namespace Drydev\WxWork\Internal\Customer\Customer;

use Drydev\WxWork\Support\Http;

class CustomerClient extends Http
{
    public function getCustomer(string $externalUserId)
    {
        return $this->get('externalcontact/get', ['external_userid' => $externalUserId]);
    }

    public function deleteCustomer(string $externalUserId)
    {
        return $this->post('externalcontact/delete', ['external_userid' => $externalUserId]);
    }
} 
