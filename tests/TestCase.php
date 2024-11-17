<?php

namespace Drydev\WxWork\Tests;

use Drydev\WxWork\WxWorkClient;
use PHPUnit\Framework\TestCase as BaseTestCase;
use Mockery;

class TestCase extends BaseTestCase
{
    protected $client;
    
    protected function setUp(): void
    {
        parent::setUp();
        
        $this->client = new WxWorkClient([
            'corp_id' => 'mock-corp-id',
            'secret' => 'mock-secret',
            'agent_id' => 1000002
        ]);
    }
    
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
} 
