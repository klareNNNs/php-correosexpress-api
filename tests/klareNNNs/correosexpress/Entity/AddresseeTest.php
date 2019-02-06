<?php

namespace klareNNNs\correosexpress\Entity;

use PHPUnit\Framework\TestCase;

class AddresseeTest extends TestCase
{
    public function testItShouldCreateCorrectAddressee()
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

        $this->assertEquals($code, $addressee->getCode());
        $this->assertEquals($name, $addressee->getName());
        $this->assertEquals($nif, $addressee->getNif());
        $this->assertEquals($phone, $addressee->getPhone());
        $this->assertEquals($email, $addressee->getEmail());
        $this->assertInstanceOf(Address::class, $addressee->getAddress());
    }
}
