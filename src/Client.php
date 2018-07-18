<?php

namespace Oceanapplications\Veloxcrmphp;

use GuzzleHttp;

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
                'base_uri' => 'https://api.veloxcrm.com/',
                'headers' =>[
                    'Authorization' => 'Basic ' . base64_encode("$username:$password"),
                    'sessionid' => session_id()
                    ]
            ]);
    }

    /**
     * @param string $endpoint
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function sendPost(string $endpoint, $data)
    {
        return $this->guzzle->post($endpoint, [
            'json'=>$data
        ]);
    }

    /**
     * @param string $endpoint
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function sendGet(string $endpoint, $data)
    {
        return $this->guzzle->get($endpoint, [
            'json'=>$data
        ]);
    }

    public function importLead($data)
    {
        return $this->sendPost('Lead/Import', json_encode($data));
    }
}