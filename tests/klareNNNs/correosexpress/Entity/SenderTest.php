<?php

namespace klareNNNs\correosexpress\Entity;

use PHPUnit\Framework\TestCase;

class SenderTest extends TestCase
{
    public function testItShouldCreateCorrectSender()
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
        $phone = '666';
        $email = '';

        $sender = new Sender($code, $name, $nif, $phone, $email, $address);

        $this->assertEquals($code, $sender->getCode());
        $this->assertEquals($name, $sender->getName());
        $this->assertEquals($nif, $sender->getNif());
        $this->assertEquals($phone, $sender->getPhone());
        $this->assertEquals($email, $sender->getEmail());
        $this->assertInstanceOf(Address::class, $sender->getAddress());
    }
}
