<?php

namespace Drydev\WxWork\Internal\Auth;

use Drydev\WxWork\Support\Http;

class AuthClient extends Http
{
    /**
     * 获取访问用户身份
     */
    public function getUserInfo(string $code)
    {
        return $this->get('auth/getuserinfo', ['code' => $code]);
    }

    /**
     * 获取访问用户敏感信息
     */
    public function getUserDetail(string $user_ticket)
    {
        return $this->post('auth/getuserdetail', ['user_ticket' => $user_ticket]);
    }

    /**
     * 获取企业授权码
     */
    public function getCorpToken(array $data)
    {
        return $this->post('service/get_corp_token', $data);
    }

    /**
     * 获取登录用户信息
     */
    public function getLoginInfo(string $auth_code)
    {
        return $this->post('service/get_login_info', ['auth_code' => $auth_code]);
    }
} 
