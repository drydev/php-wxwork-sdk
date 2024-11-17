<?php

namespace Drydev\WxWork\Internal\Media;

use Drydev\WxWork\Support\Http;

class MaterialClient extends Http
{
    /**
     * 上传图片
     */
    public function uploadImage(string $filepath)
    {
        return $this->uploadMedia('image', $filepath);
    }

    /**
     * 上传语音
     */
    public function uploadVoice(string $filepath)
    {
        return $this->uploadMedia('voice', $filepath);
    }

    /**
     * 上传视频
     */
    public function uploadVideo(string $filepath)
    {
        return $this->uploadMedia('video', $filepath);
    }

    /**
     * 上传文件
     */
    public function uploadFile(string $filepath)
    {
        return $this->uploadMedia('file', $filepath);
    }

    /**
     * 获取临时素材
     */
    public function getMaterial(string $media_id)
    {
        $response = $this->get('media/get', [
            'query' => [
                'access_token' => $this->client->getAccessToken(),
                'media_id' => $media_id,
            ],
        ]);

        return $response->getBody()->getContents();
    }

    /**
     * 上传附件资源
     */
    protected function uploadMedia(string $type, string $filepath)
    {
        return $this->post('media/upload', [
            'query' => ['type' => $type],
            'multipart' => [
                [
                    'name' => 'media',
                    'contents' => fopen($filepath, 'r'),
                    'filename' => basename($filepath)
                ]
            ]
        ]);
    }
} 
