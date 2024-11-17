# php-wxwork-sdk

[![Latest Version on Packagist](https://img.shields.io/packagist/v/drydev/php-wxwork-sdk.svg?style=flat-square)](https://packagist.org/packages/drydev/php-wxwork-sdk)
[![Total Downloads](https://img.shields.io/packagist/dt/drydev/php-wxwork-sdk.svg?style=flat-square)](https://packagist.org/packages/drydev/php-wxwork-sdk)
[![License](https://img.shields.io/github/license/drydev/php-wxwork-sdk.svg?style=flat-square)](https://github.com/drydev/php-wxwork-sdk/blob/main/LICENSE)

> ⚠️ **警告**: 该项目目前处于积极开发中，API 可能会发生变化。不建议在生产环境中使用。

企业微信 PHP SDK，支持 Composer 安装。

## 项目状态

- 🚧 开发中
- ⚠️ 所有功能尚未经过完整测试
- 📝 文档正在完善
- 🔄 API 可能会有破坏性更新

## 开发路线图

- [x] 基础框架搭建
- [x] 通讯录管理
- [x] 消息推送
- [ ] 客户联系
- [ ] 身份验证
- [ ] 完整单元测试
- [ ] 示例代码
- [ ] API 文档

## 要求

- PHP >= 7.4
- Laravel >= 8.0 (如果在 Laravel 中使用)

## 快速开始

```bash
composer require drydev/php-wxwork-sdk
```

```php
use WxWork\WxWorkClient;
// 初始化客户端
$client = new WxWorkClient([
'corpId' => 'your_corp_id',
'corpSecret' => 'your_corp_secret'
]);
// 获取部门列表
$departments = $client->contact->department->list();
// 发送消息
$client->message->send([
'touser' => 'UserID1|UserID2',
'msgtype' => 'text',
'text' => [
'content' => '你好!'
]
]);
```

## Laravel 集成

### 1. 发布配置文件

```bash
php artisan vendor:publish --tag=wxwork-config
```

将会生成 `config/wxwork.php` 配置文件：

```php
return [
    'corp_id' => env('WXWORK_CORP_ID', ''),
    'corp_secret' => env('WXWORK_CORP_SECRET', ''),
    'cache' => [
        'driver' => 'file',  // 支持 file, redis
        'path' => storage_path('wxwork/cache'),
    ],
];
```

### 2. 注册服务提供者

在 `config/app.php` 中添加：

```php
'providers' => [
    // ...
    WxWork\Laravel\WxWorkServiceProvider::class,
]
```

### 3. 注册 Facade

```php
'aliases' => [
    // ...
    'WxWork' => WxWork\Laravel\Facades\WxWork::class,
]
```

### 4. 使用示例

```php
// 控制器中使用
use WxWork\Laravel\Facades\WxWork;

class WxWorkController extends Controller
{
    public function getDepartments()
    {
        $departments = WxWork::contact()->department()->list();
        return response()->json($departments);
    }
    
    public function sendMessage()
    {
        WxWork::message()->send([
            'touser' => 'UserID1|UserID2',
            'msgtype' => 'text',
            'text' => [
                'content' => '你好!'
            ]
        ]);
    }
}

// 或者通过依赖注入使用
use WxWork\WxWorkClient;

class WxWorkController extends Controller
{
    public function index(WxWorkClient $wxwork)
    {
        $departments = $wxwork->contact->department->list();
        return response()->json($departments);
    }
}
```

## 主要模块

- 通讯录管理
  - 成员管理
  - 部门管理
  - 标签管理
  
- 客户联系
  - 客户管理
  - 客户群管理
  - 朋友圈
  
- 消息推送
  - 应用消息
  - 群聊会话
  
- 身份验证
  - 网页授权
  - 扫码登录

## 缓存配置

SDK 默认使用文件缓存，您也可以自定义缓存实现：

```php
use WxWork\Support\Cache\FileCache;

$client = new WxWorkClient([
    'corpId' => 'your_corp_id',
    'corpSecret' => 'your_corp_secret',
    'cache' => new FileCache('/path/to/cache')
]);
```

### Laravel 中的缓存配置

在 Laravel 中，SDK 会自动使用 Laravel 的缓存系统。您可以在 `config/wxwork.php` 中配置缓存驱动：

```php
'cache' => [
    'driver' => 'redis',  // 使用 Redis 缓存
    'connection' => 'default', // Redis 连接名
    'prefix' => 'wxwork:', // 缓存键前缀
],
```

## 异常处理

```php
use WxWork\Exceptions\WxWorkException;

try {
    $client->contact->user->get('userid');
} catch (WxWorkException $e) {
    echo $e->getMessage();
}
```

## 文档

完整的 API 文档请参考 [企业微信开发文档](https://work.weixin.qq.com/api/doc)

## License

MIT

## 贡献指南

欢迎提交 Issue 和 Pull Request
