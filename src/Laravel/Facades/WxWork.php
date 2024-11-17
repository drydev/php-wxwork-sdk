<?php

namespace WxWork\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class WxWork extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'wxwork';
    }
} 
