<?php

use PHPUnit\Framework\TestCase;
use Oceanapplications\Veloxcrmphp\Client;
//use Dotenv\Dotenv;

class TestClient extends TestCase
{
    public function __construct() {
        parent::__construct();

    }

    public function setUp()
    {
        $dotenv = new Dotenv\Dotenv(__DIR__);
        $dotenv->load();
    }



    public function testImportLead(){

        $lead = new Oceanapplications\Veloxcrmphp\Data\Lead();
        $lead->FirstName = "FirstN";

        $client = new Client($_ENV['API_USERNAME'], $_ENV['API_PASSWORD']);


        $result = $client->importLead($lead);

        var_dump($result);

    }
}
