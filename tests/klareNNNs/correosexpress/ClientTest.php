<?php

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use klareNNNs\correosexpress\Client;
use klareNNNs\correosexpress\Entity\Address;
use klareNNNs\correosexpress\Entity\Addressee;
use klareNNNs\correosexpress\Entity\AuthHeader;
use klareNNNs\correosexpress\Entity\Order;
use klareNNNs\correosexpress\Entity\Request;
use klareNNNs\correosexpress\Entity\Sender;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    const TEST_SOAP_CLIENT = 'https://test.correosexpress.com/wspsc/apiRestGrabacionEnvio/json/grabacionEnvio';
    private $client;
    private $auth;
    private $request;


    public function setUp()
    {
        $street = 'C/NUEVA,2';
        $city = 'MADRID';
        $nationalPostalCode = '28010';
        $country = '';
        $internationalPostalCode = '';

        $address = new Address($street, $city, $nationalPostalCode, $country, $internationalPostalCode);

        $code = '555559999';
        $name = 'PRUEBA EOF2';
        $nif = '';
        $phone = '666666666';
        $email = '';

        $addressee = new Addressee($code, $name, $nif, $phone, $email, $address);

        $code = '555559999';
        $name = 'PRUEBA EOF2';
        $nif = '';
        $phone = '666666666';
        $email = '';

        $sender = new Sender($code, $name, $nif, $phone, $email, $address);

        $clientCode = '1';
        $date = new \DateTime('now');
        $comments = 'ninguna';
        $numberOfPackages = '1';
        $weight = '1';
        $productCode = '63';
        $shippingPayed = 'P';
        $reembolso = '';

        $order = new Order($clientCode, $date, $comments, $numberOfPackages, $weight, $productCode, $shippingPayed, $reembolso);

        $mock = new MockHandler([
            new Response(200, [], '{"codigoRetorno":0,"mensajeRetorno":"","datosResultado":"3230002000112134","listaBultos":[{"orden":"01","codUnico":"32300020001121301280108"}],"etiqueta":[{}],"numRecogida":null,"fechaRecogida":null,"horaRecogidaDesde":null,"horaRecogidaHasta":null,"direccionRecogida":null,"poblacionRecogida":null}')
        ]);
        $handler = HandlerStack::create($mock);
        $this->client = new GuzzleHttp\Client(['handler' => $handler]);

        $this->auth = new AuthHeader('xxx', 'xxx');
        $this->request = new Request($order, $addressee, $sender);

    }

    public function testCanCreateClient()
    {
        $client = new Client($this->client, $this->auth, $this->request);
        $this->assertInstanceOf(Client::class, $client);
    }

    public function testCorrectResponseWhenCorrectData()
    {
        $client = new Client($this->client, $this->auth, $this->request);

        $client->setServiceAccess(self::TEST_SOAP_CLIENT);
        $response = $client->request();

        $content = json_decode($response->getBody()->getContents());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(0, $content->codigoRetorno);
    }
}
