<?php

namespace Oceanapplications\Veloxcrmphp\Data;

class FullSale extends Request
{
    public	$FirstName;
    public	$LastName;
    public	$Email;
    public	$Cell;
    public	$Phone;
    public	$Address1;
    public	$Address2;
    public	$City;
    public	$StateID;
    public	$Zip;
    public	$CountryID;
    public	$Custom1;
    public	$Custom2;
    public	$Custom3;
    public	$Custom4;
    public	$Custom5;
    public	$OfferID;
    public	$AffiliateID;
    public	$SubAffiliateID;
    public	$BillingCycleProfileID;
    public	$C1;
    public	$C2;
    public	$C3;
    public	$C4;
    public	$C5;
    public	$PaymentMethodID;
    public	$CardNumber;
    public	$ExpiryMonth;
    public	$ExpiryYear;
    public	$Cvv;
    public	$AgreeToTelemarketing;
    public	$AgreeToTerms;
    public	$OS;
    public	$Browser;
    public	$IpAddress;
    public	$PageUrl;
    public	$ThreeDSecureEnrolledStatus;
    public	$InitialECI;
    public	$InitialCAVV;
    public	$InitialXID;
    public	$RebillECI;
    public	$RebillCAVV;
    public	$RebillXID;

    public function __construct()
    {
        parent::__construct();
        $this->AgreeToTelemarketing = true;
        $this->AgreeToTerms = true;
    }

}