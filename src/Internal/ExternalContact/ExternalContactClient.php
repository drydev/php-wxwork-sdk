<?php

namespace Drydev\WxWork\Internal\ExternalContact;

use Drydev\WxWork\Contracts\ClientInterface;
use Drydev\WxWork\Support\Http;

class ExternalContactClient extends Http
{
    protected $client;

    public function __construct(ClientInterface $client)
    {
        parent::__construct($client);
        $this->client = $client;
    }

    /**
     * 获取配置客户联系功能
     */
    public function getFollowUsers()
    {
        return $this->get('externalcontact/get_follow_user_list');
    }

    /**
     * 获取客户列表
     */
    public function list(string $userid)
    {
        return $this->get('externalcontact/list', ['userid' => $userid]);
    }

    /**
     * 获取客户详情
     */
    public function getDetail(string $external_userid)
    {
        return $this->get('externalcontact/get', ['external_userid' => $external_userid]);
    }

    /**
     * 批量获取客户详情
     */
    public function batch(array $userids)
    {
        return $this->post('externalcontact/batch/get_by_user', [
            'userid_list' => $userids
        ]);
    }
} 
