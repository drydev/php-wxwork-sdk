<?php

namespace Drydev\WxWork\Internal\Customer\Moments;

use Drydev\WxWork\Support\Http;

class MomentsClient extends Http
{
    /**
     * 创建发表朋友圈任务
     * @param array $params [
     *     'text' => [
     *         'content' => '文本内容'
     *     ],
     *     'attachments' => [  // 附件，最多支持9个图片或1个视频
     *         [
     *             'msgtype' => 'image',
     *             'image' => [
     *                 'media_id' => 'MEDIA_ID'
     *             ]
     *         ]
     *     ],
     *     'visible_range' => [  // 可见范围
     *         'sender_list' => ['zhangsan', 'lisi'],  // 发表任务的执行者列表
     *         'external_contact_list' => ['woaini', 'woaini2']  // 可见的客户列表
     *     ]
     * ]
     * @return array
     * @throws \Drydev\WxWork\Exceptions\WxWorkException
     */
    public function createTask(array $params)
    {
        return $this->post('externalcontact/add_moment_task', $params);
    }

    /**
     * 获取任务创建结果
     * @param string $jobid 异步任务id
     * @return array
     * @throws \Drydev\WxWork\Exceptions\WxWorkException
     */
    public function getTaskResult(string $jobid)
    {
        return $this->get('externalcontact/get_moment_task_result', ['jobid' => $jobid]);
    }

    /**
     * 获取企业全部的发表记录
     * @param array $params [
     *     'start_time' => 1605000000,  // 朋友圈记录开始时间
     *     'end_time' => 1605172726,    // 朋友圈记录结束时间
     *     'creator' => 'zhangsan',     // 朋友圈创建人的userid
     *     'filter_type' => 1,          // 朋友圈类型
     *     'cursor' => 'CURSOR',        // 用于分页查询的游标
     *     'limit' => 100               // 返回的最大记录数
     * ]
     * @return array
     * @throws \Drydev\WxWork\Exceptions\WxWorkException
     */
    public function getList(array $params)
    {
        return $this->post('externalcontact/get_moment_list', $params);
    }
    
    /**
     * 获取客户朋友圈企业发表的列表
     * @param array $params [
     *     'moment_id' => 'momxxx',     // 朋友圈id
     *     'cursor' => 'CURSOR',        // 用于分页查询的游标
     *     'limit' => 100               // 返回的最大记录数
     * ]
     * @return array
     * @throws \Drydev\WxWork\Exceptions\WxWorkException
     */
    public function getTaskList(array $params)
    {
        return $this->post('externalcontact/get_moment_task', $params);
    }

    /**
     * 获取客户朋友圈发表时选择的可见范围
     * @param string $moment_id 朋友圈id
     * @param string $userid 企业发表成员userid
     * @param array $params [
     *     'cursor' => 'CURSOR',        // 用于分页查询的游标
     *     'limit' => 100               // 返回的最大记录数
     * ]
     * @return array
     * @throws \Drydev\WxWork\Exceptions\WxWorkException
     */
    public function getVisibleRange(string $moment_id, string $userid, array $params = [])
    {
        $params = array_merge([
            'moment_id' => $moment_id,
            'userid' => $userid
        ], $params);
        
        return $this->post('externalcontact/get_moment_send_result', $params);
    }

    /**
     * 获取客户朋友圈的互动数据
     * @param string $moment_id 朋友圈id
     * @param string $userid 企业发表成员userid
     * @return array
     * @throws \Drydev\WxWork\Exceptions\WxWorkException
     */
    public function getComments(string $moment_id, string $userid)
    {
        return $this->post('externalcontact/get_moment_comments', [
            'moment_id' => $moment_id,
            'userid' => $userid
        ]);
    }
} 
