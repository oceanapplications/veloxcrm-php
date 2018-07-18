<?php

use PHPUnit\Framework\TestCase;
use Oceanapplications\Veloxcrmphp\Client;
use Oceanapplications\Veloxcrmphp\Data\States;
use Oceanapplications\Veloxcrmphp\Data\Countries;

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


    public function testStateList(){
        $state = States::GetStateId("New York");
        $this->assertEquals(32, $state);
    }

    public function testCountryList(){
        $country = Countries::GetCountryId("United States");
        $this->assertEquals(184, $country);
    }

    public function testImportLead(){

        $lead = new Oceanapplications\Veloxcrmphp\Data\Lead();
        $lead->OfferID = 235;
        $lead->FirstName = "FirstN";
        $lead->LastName = "LastN";
        $lead->Address1 = "address1";
        $lead->Address2 = "address2";
        $lead->City = "city";
        $lead->StateID = States::GetStateId("New York");
        $lead->Zip = "ZIP";
        $lead->CountryID = Countries::GetCountryId("United States");
        $lead->Phone = "4844844848";
        $lead->Email = "test@test.com";

        $client = new Client($_ENV['API_USERNAME'], $_ENV['API_PASSWORD']);


        $result = $client->importLead($lead);

        var_dump($result);

    }
}
