<?php

namespace Drydev\WxWork\Tests\Internal\Message;

use Drydev\WxWork\Internal\Message\MessageBuilder;
use Drydev\WxWork\Tests\TestCase;

class MessageBuilderTest extends TestCase
{
    protected $builder;

    protected function setUp(): void
    {
        parent::setUp();
        $this->builder = new MessageBuilder();
    }

    public function testText()
    {
        $message = $this->builder
            ->to('zhangsan')
            ->text('hello')
            ->build();

        $this->assertEquals([
            'touser' => 'zhangsan',
            'msgtype' => 'text',
            'agentid' => 0,
            'text' => ['content' => 'hello']
        ], $message);
    }

    public function testImage()
    {
        $message = $this->builder
            ->to('zhangsan')
            ->image('MEDIA_ID')
            ->build();

        $this->assertEquals([
            'touser' => 'zhangsan',
            'msgtype' => 'image',
            'agentid' => 0,
            'image' => ['media_id' => 'MEDIA_ID']
        ], $message);
    }
} 
