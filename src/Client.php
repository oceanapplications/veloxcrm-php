<?php

namespace Oceanapplications\Veloxcrmphp;

use GuzzleHttp;
use Oceanapplications\Veloxcrmphp\Data\Request;

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
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function sendPost(string $endpoint, Request $data)
    {
        return $this->guzzle->post($endpoint, [
            'json'=>$data
        ]);
    }

    /**
     * @param string $endpoint
     * @param Request $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function sendGet(string $endpoint, Request $data)
    {
        return $this->guzzle->get($endpoint, [
            'query'=>get_object_vars($data)
        ]);
    }

    public function importLead(Request $data)
    {
        return $this->sendPost('Prospects/Add', $data);
    }
}