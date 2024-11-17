<?php

namespace Drydev\WxWork\Internal\Agent\Menu;

use Drydev\WxWork\Support\Http;

class MenuClient extends Http
{
    /**
     * 创建应用菜单
     * @param array $buttons [
     *     [
     *         'type' => 'click',              // 菜单的响应动作类型
     *         'name' => '今日歌曲',           // 菜单标题，不超过16个字节
     *         'key' => 'V1001_TODAY_MUSIC',   // click等点击类型必须
     *         'url' => 'http://www.qq.com',   // view类型必须
     *         'sub_button' => [               // 二级菜单数组，个数应为1~5个
     *             [
     *                 'type' => 'view',
     *                 'name' => '搜索',
     *                 'url' => 'http://www.soso.com/'
     *             ]
     *         ]
     *     ]
     * ]
     * @param int|null $agentid 应用ID,不传则使用配置的应用ID
     * @return array
     * @throws \Drydev\WxWork\Exceptions\WxWorkException
     */
    public function create(array $buttons, ?int $agentid = null)
    {
        $params = ['button' => $buttons];
        
        if ($agentid) {
            $params['agentid'] = $agentid;
        }
        
        return $this->post('menu/create', $params);
    }

    /**
     * 获取菜单配置
     * @param int|null $agentid 应用ID,不传则使用配置的应用ID
     * @return array [
     *     'button' => [
     *         [
     *             'type' => 'click',
     *             'name' => '今日歌曲',
     *             'key' => 'V1001_TODAY_MUSIC'
     *         ],
     *         [
     *             'name' => '菜单',
     *             'sub_button' => [
     *                 'list' => [
     *                     [
     *                         'type' => 'view',
     *                         'name' => '搜索',
     *                         'url' => 'http://www.soso.com/'
     *                     ]
     *                 ]
     *             ]
     *         ]
     *     ]
     * ]
     * @throws \Drydev\WxWork\Exceptions\WxWorkException
     */
    public function getMenu(?int $agentid = null)
    {
        $params = [];
        if ($agentid) {
            $params['agentid'] = $agentid;
        }

        return $this->get('menu/get', $params);
    }

    /**
     * 删除菜单
     * @param int|null $agentid 应用ID,不传则使用配置的应用ID
     * @return array
     * @throws \Drydev\WxWork\Exceptions\WxWorkException
     */
    public function delete(?int $agentid = null)
    {
        $params = [];
        if ($agentid) {
            $params['agentid'] = $agentid;
        }
        
        return $this->get('menu/delete', $params);
    }
} 
