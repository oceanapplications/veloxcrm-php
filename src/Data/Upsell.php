<?php

namespace Oceanapplications\Veloxcrmphp\Data;


class Upsell extends Request
{
    public	$PaymentMethodID;
    public	$CardNumber;
    public	$ExpiryMonth;
    public	$ExpiryYear;
    public	$Cvv;
    public	$AgreeToTelemarketing;
    public	$AgreeToTerms;
    public	$OfferID;
    public	$BillingCycleProfileID;
    public	$OrderID;
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