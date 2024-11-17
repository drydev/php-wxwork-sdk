<?php

namespace Drydev\WxWork;

use Drydev\WxWork\Contracts\ClientInterface;
use Drydev\WxWork\Support\AccessToken;
use Drydev\WxWork\Support\Config;
use GuzzleHttp\Client;
use Drydev\WxWork\Support\Cache\CacheInterface;
use Drydev\WxWork\Exceptions\RuntimeException;

class WxWorkClient implements ClientInterface
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * @var AccessToken
     */
    protected $accessToken;

    protected $cache;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = new Config($config);
        $this->httpClient = new Client([
            'base_uri' => env('WXWORK_API_URL', 'https://qyapi.weixin.qq.com/cgi-bin/'),
            'timeout'  => env('WXWORK_TIMEOUT', 5.0),
            'http_errors' => env('WXWORK_HTTP_ERRORS', false),
        ]);
        $this->accessToken = new AccessToken($this);
    }

    /**
     * 获取 HTTP 客户端
     */
    public function getHttpClient(): Client
    {
        return $this->httpClient;
    }

    /**
     * 获取配置
     */
    public function getConfig(): Config
    {
        return $this->config;
    }

    /**
     * 获取 AccessToken
     */
    public function getAccessToken(): string
    {
        $cacheKey = sprintf('wxwork.access_token.%s', $this->config->getCorpId());

        if ($this->cache && $token = $this->cache->get($cacheKey)) {
            return $token;
        }

        $response = $this->httpClient->get('gettoken', [
            'query' => [
                'corpid' => $this->config->getCorpId(),
                'corpsecret' => $this->config->getSecret(),
            ],
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        if (empty($result['access_token'])) {
            throw new RuntimeException('Failed to get access token: ' . ($result['errmsg'] ?? 'Unknown error'));
        }

        if ($this->cache) {
            $this->cache->set($cacheKey, $result['access_token'], $result['expires_in'] - 500);
        }

        return $result['access_token'];
    }

    /**
     * 获取通讯录管理实例
     */
    public function contact()
    {
        return new Internal\Contact\ContactClient($this);
    }

    /**
     * 获取客户联系管理实例
     */
    public function customer()
    {
        return new Internal\Customer\CustomerClient($this);
    }

    /**
     * 获取消息推送实例
     */
    public function message()
    {
        return new Internal\Message\MessageClient($this);
    }

    /**
     * 获取媒体文件管理实例
     */
    public function media()
    {
        return new Internal\Media\MediaClient($this);
    }

    /**
     * 获取应用管理实例
     */
    public function agent()
    {
        return new Internal\Agent\AgentClient($this);
    }

    /**
     * 获取身份验证实例
     */
    public function auth()
    {
        return new Internal\Auth\AuthClient($this);
    }

    /**
     * 获取JS-SDK实例
     */
    public function jssdk()
    {
        return new Internal\JsSdk\JsSdkClient($this);
    }

    /**
     * 获取外部联系人管理实例
     */
    public function externalContact()
    {
        return new Internal\ExternalContact\ExternalContactClient($this);
    }

    /**
     * 获取会话存档管理实例
     */
    public function msgAudit()
    {
        return new Internal\MsgAudit\MsgAuditClient($this);
    }

    /**
     * 获取素材管理实例
     */
    public function material()
    {
        return new Internal\Media\MaterialClient($this);
    }

    /**
     * 获取日程管理实例
     */
    public function schedule()
    {
        return new Internal\Schedule\ScheduleClient($this);
    }

    /**
     * 获取直播管理实例
     */
    public function living()
    {
        return new Internal\Living\LivingClient($this);
    }

    /**
     * 获取会议管理实例
     */
    public function meeting()
    {
        return new Internal\Meeting\MeetingClient($this);
    }

    /**
     * 获取打卡管理实例
     */
    public function checkin()
    {
        return new Internal\Checkin\CheckinClient($this);
    }

    /**
     * 获取审批管理实例
     */
    public function approval()
    {
        return new Internal\Approval\ApprovalClient($this);
    }

    /**
     * 获取审批模板管理实例
     */
    public function approvalTemplate()
    {
        return new Internal\Approval\TemplateClient($this);
    }

    /**
     * 获取审批流程控制实例
     */
    public function approvalProcess()
    {
        return new Internal\Approval\ProcessClient($this);
    }

    /**
     * 获取企业支付实例
     */
    public function payment()
    {
        return new Internal\Payment\PaymentClient($this);
    }

    /**
     * 获取电子发票实例
     */
    public function invoice()
    {
        return new Internal\Invoice\InvoiceClient($this);
    }

    /**
     * 获取发票卡券实例
     */
    public function invoiceCard()
    {
        return new Internal\Invoice\CardClient($this);
    }

    /**
     * 获取企业互联管理实例
     */
    public function corp()
    {
        return new Internal\Corp\CorpClient($this);
    }

    /**
     * 获取企业互联群聊管理实例
     */
    public function corpGroupChat()
    {
        return new Internal\Corp\GroupChatClient($this);
    }

    /**
     * 获取上下游企业关系管理实例
     */
    public function corpChain()
    {
        return new Internal\Corp\ChainClient($this);
    }

    /**
     * 获取异步批量接口实例
     */
    public function batch()
    {
        return new Internal\Contact\Batch\BatchClient($this);
    }

    /**
     * 获取客户朋友圈管理实例
     */
    public function moments()
    {
        return new Internal\Customer\Moments\MomentsClient($this);
    }

    /**
     * 获取自定义菜单管理实例
     */
    public function menu()
    {
        return new Internal\Agent\Menu\MenuClient($this);
    }

    /**
     * 获取统计分析实例
     */
    public function statistics()
    {
        return new Internal\Customer\Statistics\StatisticsClient($this);
    }

    /**
     * 获取群机器人实例
     */
    public function robot()
    {
        return new Internal\Robot\RobotClient($this);
    }

    public function setCache(CacheInterface $cache)
    {
        $this->cache = $cache;
        return $this;
    }

    public function getCache(): ?CacheInterface
    {
        return $this->cache;
    }
}

