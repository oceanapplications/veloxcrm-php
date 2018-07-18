<?php

use PHPUnit\Framework\TestCase;
use Oceanapplications\Veloxcrmphp\Client;


class TestClient extends TestCase
{
    public function __construct() {
        parent::__construct();
    }

    public function testClient()
    {
        $client = new Client();
        $this->assertTrue($client->sendRequest());
    }
}
