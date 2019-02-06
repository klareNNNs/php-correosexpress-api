<?php

namespace klareNNNs\correosexpress\Entity;


use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{

    public function testItShouldCreateCorrectAddress()
    {
        $street = 'C/NUEVA,2';
        $city = 'MADRID';
        $nationalPostalCode = '28010';
        $country = '';
        $internationalPostalCode = '';

        $address = new Address($street, $city, $nationalPostalCode, $country, $internationalPostalCode);

        $this->assertEquals($street, $address->getStreet());
        $this->assertEquals($city, $address->getCity());
        $this->assertEquals($nationalPostalCode, $address->getNationalPostalCode());
        $this->assertEquals($country, $address->getCountry());
        $this->assertEquals($internationalPostalCode, $address->getInternationalPostalCode());
    }
}