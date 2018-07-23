<?php

namespace Oceanapplications\Veloxcrmphp;

use GuzzleHttp;
use Oceanapplications\Veloxcrmphp\Data\FullSale;
use Oceanapplications\Veloxcrmphp\Data\NewSale;
use Oceanapplications\Veloxcrmphp\Data\Prospect;
use Oceanapplications\Veloxcrmphp\Data\Request;
use Oceanapplications\Veloxcrmphp\Data\Upsell;
use phpDocumentor\Reflection\Types\Object_;

class Client
{
    private $username;
    private $password;

    private $guzzle;

    /**
     * Client constructor.
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password) {
        $this->username = $username;
        $this->password = $password;

        $this->guzzle = new GuzzleHttp\Client([
                'base_uri' => 'https://crm.veloxcrm.com/api/',
                'headers' =>[
                    'Accept'=> 'application/json',
                    'Authorization' => 'Basic ' . base64_encode("$username:$password"),
                    'sessionid' => session_id()
                ]
            ]);
    }

    /**
     * @param string $endpoint
     * @param Request $data
     * @return String
     */
    private function sendPost(string $endpoint, Request $data)
    {
        return $this->guzzle->post($endpoint, [
            'json'=>$data
        ])->getBody()->getContents();
    }

    /**
     * @param string $endpoint
     * @param Request $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function sendGet(string $endpoint, Request $data)
    {
        return $this->guzzle->get($endpoint, [
            'query'=>get_object_vars($data)
        ]);
    }

    /**
     * @param Prospect $data
     * @return object
     */
    public function addProspect(Prospect $data)
    {
        return json_decode($this->sendPost('Prospects/Add', $data));
    }

    /**
     * @param NewSale $data
     * @return object
     */
    public function newSale(NewSale $data)
    {
        return json_decode($this->sendPost('Orders/NewSale', $data));
    }

    /**
     * @param FullSale $data
     * @return object
     */
    public function fullSale(FullSale $data)
    {
        return json_decode($this->sendPost('Orders/FullSale', $data));
    }

    /**
     * @param Upsell $upsell
     * @return String
     */
    public function upSale(Upsell $upsell)
    {
        return $this->sendPost('Orders/UpSale', $upsell);
    }

    /**
     * @param int $orderId
     * @return object
     */
    public function thankYou(int $orderId)
    {
        return json_decode($this->guzzle->get('Orders/ThankYou', [
            'query'=>['orderID'=>$orderId]
        ])->getBody()->getContents());
    }
}