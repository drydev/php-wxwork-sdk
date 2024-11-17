<?php

namespace Drydev\WxWork\Support\Cache;

class FileCache implements CacheInterface
{
    protected $dir;

    public function __construct(string $dir = null)
    {
        $this->dir = $dir ?: sys_get_temp_dir();
    }

    public function get(string $key)
    {
        $file = $this->getFilePath($key);
        if (!is_file($file)) {
            return null;
        }

        $content = file_get_contents($file);
        $data = unserialize($content);

        if (empty($data) || !isset($data['value']) || !isset($data['expire'])) {
            return null;
        }

        if ($data['expire'] > 0 && $data['expire'] < time()) {
            $this->delete($key);
            return null;
        }

        return $data['value'];
    }

    public function set(string $key, $value, int $ttl = 7200)
    {
        $file = $this->getFilePath($key);
        $data = [
            'value' => $value,
            'expire' => $ttl > 0 ? time() + $ttl : 0,
        ];

        return file_put_contents($file, serialize($data));
    }

    public function delete(string $key)
    {
        $file = $this->getFilePath($key);
        if (is_file($file)) {
            return unlink($file);
        }
        return false;
    }

    public function clear()
    {
        $files = glob($this->dir . '/wxwork_*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        return true;
    }

    protected function getFilePath(string $key): string
    {
        return $this->dir . '/wxwork_' . md5($key);
    }
}

