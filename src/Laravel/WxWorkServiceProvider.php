<?php

namespace WxWork\Laravel;

use Drydev\WxWork\WxWorkClient;
use Illuminate\Support\ServiceProvider;
use Drydev\WxWork\Support\Cache\FileCache;
use Drydev\WxWork\Support\Cache\RedisCache;

class WxWorkServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/wxwork.php' => config_path('wxwork.php'),
        ], 'wxwork-config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/wxwork.php', 'wxwork'
        );

        $this->app->singleton(WxWorkClient::class, function ($app) {
            return new WxWorkClient([
                'corpId' => config('wxwork.corp_id'),
                'corpSecret' => config('wxwork.corp_secret'),
                'cache' => $this->resolveCacheDriver(),
            ]);
        });

        $this->app->alias(WxWorkClient::class, 'wxwork');
    }

    protected function resolveCacheDriver()
    {
        $config = config('wxwork.cache');
        
        if ($config['driver'] === 'redis') {
            return new RedisCache(
                $this->app['redis']->connection($config['connection'] ?? 'default'),
                $config['prefix'] ?? 'wxwork:'
            );
        }

        return new FileCache($config['path'] ?? storage_path('wxwork/cache'));
    }
} 
