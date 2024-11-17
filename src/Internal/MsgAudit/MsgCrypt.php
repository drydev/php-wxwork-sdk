<?php

namespace Drydev\WxWork\Internal\MsgAudit;

class MsgCrypt
{
    private $key;
    
    public function __construct(string $key)
    {
        $this->key = base64_decode($key . '=');
    }

    /**
     * 解密会话内容
     */
    public function decrypt(string $encrypted_msg)
    {
        $decrypted = openssl_decrypt(
            base64_decode($encrypted_msg),
            'AES-256-CBC',
            $this->key,
            OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING,
            substr($this->key, 0, 16)
        );
        
        $pad = ord(substr($decrypted, -1));
        if ($pad < 1 || $pad > 32) {
            $pad = 0;
        }
        
        return substr($decrypted, 0, (strlen($decrypted) - $pad));
    }
} 
