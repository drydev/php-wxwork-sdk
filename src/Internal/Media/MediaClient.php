<?php

namespace Drydev\WxWork\Internal\Media;

use Drydev\WxWork\Support\Http;

class MediaClient extends Http
{
    /**
     * 上传临时素材
     */
    public function upload(string $type, string $path)
    {
        return $this->post('media/upload', [
            'multipart' => [
                [
                    'name' => 'media',
                    'contents' => fopen($path, 'r'),
                    'filename' => basename($path)
                ],
                [
                    'name' => 'type',
                    'contents' => $type
                ]
            ]
        ]);
    }

    /**
     * 获取临时素材
     */
    public function getMedia(string $media_id)
    {
        return $this->get('media/get', ['media_id' => $media_id]);
    }

    /**
     * 上传图片
     */
    public function uploadImg(string $path)
    {
        return $this->post('media/uploadimg', [
            'multipart' => [
                [
                    'name' => 'media',
                    'contents' => fopen($path, 'r'),
                    'filename' => basename($path)
                ]
            ]
        ]);
    }
} 
