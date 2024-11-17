<?php

namespace Drydev\WxWork\Exceptions;

class WxWorkException extends \Exception
{
    protected $errorCode;
    protected $errorMsg;

    public function __construct($message = "", $code = 0, $previous = null)
    {
        if (is_array($message)) {
            $this->errorCode = $message['errcode'] ?? $code;
            $this->errorMsg = $message['errmsg'] ?? 'Unknown error';
            $message = "[$this->errorCode] $this->errorMsg";
        }

        parent::__construct($message, $code, $previous);
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }

    public function getErrorMsg()
    {
        return $this->errorMsg;
    }
} 
