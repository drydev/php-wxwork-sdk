<?php

namespace Drydev\WxWork\Internal\Contact\Batch;

use Drydev\WxWork\Support\Http;

class BatchClient extends Http
{
    /**
     * 增量更新成员
     * @param array $params [
     *     'media_id' => '文件的media_id',
     *     'to_invite' => true|false,  // 是否邀请新建的成员使用企业微信
     *     'callback' => [  // 回调信息
     *         'url' => '回调的url',
     *         'token' => '回调的token',
     *         'encodingaeskey' => '回调的加密key'
     *     ]
     * ]
     */
    public function syncUser(array $params)
    {
        return $this->post('batch/syncuser', $params);
    }

    /**
     * 全量覆盖成员
     */
    public function replaceUser(array $params)
    {
        return $this->post('batch/replaceuser', $params);
    }

    /**
     * 获取异步任务结果
     */
    public function getBatchResult(string $jobId)
    {
        return $this->get('batch/getresult', ['jobid' => $jobId]);
    }

    /**
     * 删除异步任务
     */
    public function deleteBatchJob(string $jobId)
    {
        return $this->post('batch/delete', ['jobid' => $jobId]);
    }
}
