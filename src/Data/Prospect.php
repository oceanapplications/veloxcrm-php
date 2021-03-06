<?php

namespace Oceanapplications\Veloxcrmphp\Data;


class Prospect extends Request
{
    public  $OfferID;
    public  $FirstName;
    public	$LastName;
    public	$Address1;
    public	$Address2;
    public	$City;
    public	$StateID;
    public	$Zip;
    public	$CountryID;
    public  $Phone;
    public	$CellPhone;
    public	$Email;
    public	$BillingAddress1;
    public	$BillingAddress2;
    public	$BillingCity;
    public	$BillingStateID;
    public	$BillingZip;
    public	$BillingCountryID;
    public	$AffiliateID;
    public	$SubAffiliateID;
    public	$Custom1;
    public	$Custom2;
    public	$Custom3;
    public	$Custom4;
    public	$Custom5;
    public	$AgreeToTelemarketing;
    public	$AgreeToTerms;
    public	$PageUrl;

    public function __construct()
    {
        parent::__construct();
        $this->AgreeToTelemarketing = true;
        $this->AgreeToTerms = true;
    }

}