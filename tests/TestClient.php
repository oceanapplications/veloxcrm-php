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

        $state = States::GetStateId("NY");
        $this->assertEquals(32, $state);
    }

    public function testCountryList(){
        $country = Countries::GetCountryId("United States");
        $this->assertEquals(184, $country);
    }

    public function testCardDetector(){
        $request = new \Oceanapplications\Veloxcrmphp\Data\Request();
        $result = $request->getCardType('4111111111111111');
        $this->assertEquals(1, $result);
    }

    public function AddProspect(){

        $prospect = new Oceanapplications\Veloxcrmphp\Data\Prospect();
        $prospect->OfferID = 235;
        $prospect->FirstName = "FirstN";
        $prospect->LastName = "LastN";
        $prospect->Address1 = "address1";
        $prospect->Address2 = "address2";
        $prospect->City = "city";
        $prospect->StateID = States::GetStateId("New York");
        $prospect->Zip = "ZIP";
        $prospect->CountryID = Countries::GetCountryId("United States");
        $prospect->Phone = "4844844848";
        $prospect->Email = "test@test.com";

        $client = new Client($_ENV['API_USERNAME'], $_ENV['API_PASSWORD']);

        $result = $client->addProspect($prospect);
        return json_decode($result)->ProspectId;
    }

    public function testAddOrder(){
        $prospectID = $this->AddProspect();

        $sale = new \Oceanapplications\Veloxcrmphp\Data\NewSale();
        $sale->ProspectID = $prospectID;
        $sale->PaymentMethodID = 1;
        $sale->CardNumber = "4111111111111111";
        $sale->ExpiryMonth = "1";
        $sale->ExpiryYear = "2019";
        $sale->Cvv = "099";
        $sale->BillingCycleProfileID = "715";

        $client = new Client($_ENV['API_USERNAME'], $_ENV['API_PASSWORD']);
        $result = $client->newSale($sale);

    }
}
