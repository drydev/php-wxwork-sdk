<?php

namespace Drydev\WxWork\Internal\Customer\Group;

use Drydev\WxWork\Support\Http;

class GroupClient extends Http
{
    public function getGroupChat(string $chatId)
    {
        return $this->get('externalcontact/groupchat/get', ['chat_id' => $chatId]);
    }

    public function deleteGroupChat(string $chatId)
    {
        return $this->post('externalcontact/groupchat/delete', ['chat_id' => $chatId]);
    }
} 
