<?php

namespace klareNNNs\correosexpress;

use klareNNNs\correosexpress\Entity\AuthHeader;
use klareNNNs\correosexpress\Entity\Request;

class Client
{

    private $client;
    private $authHeader;
    private $request;
    private $serviceAccess = 'https://www.correosexpress.com/wpsc/apiRestGrabacionEnvio/json/grabacionEnvio';

    /**
     * Client constructor.
     * @param \GuzzleHttp\Client $client
     * @param AuthHeader $auth
     * @param Request $request
     */
    public function __construct(\GuzzleHttp\Client $client, AuthHeader $auth, Request $request)
    {
        $this->client = $client;
        $this->authHeader = $auth;
        $this->request = $request;
    }

    public function request()
    {
        try{

            $response = $this->client->request('POST', $this->serviceAccess, [
                'auth' => [$this->authHeader->getUser(), $this->authHeader->getPassword()],
                'json' => $this->request->build(),
            ]);
        }catch (\Exception $e){
            dump($e->getMessage());
        }

        return $response;
    }

    public function setServiceAccess($serviceAccess)
    {
        $this->serviceAccess = $serviceAccess;
    }
}