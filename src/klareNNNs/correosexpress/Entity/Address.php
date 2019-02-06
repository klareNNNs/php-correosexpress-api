<?php

namespace klareNNNs\correosexpress\Entity;

final class Address
{
    private $internationalPostalCode;
    private $country;
    private $nationalPostalCode;
    private $city;
    private $street;

    public function __construct($street, $city, $nationalPostalCode, $country, $internationalPostalCode)
    {
        $this->street = $street;
        $this->city = $city;
        $this->nationalPostalCode = $nationalPostalCode;
        $this->country = $country;
        $this->internationalPostalCode = $internationalPostalCode;
    }

    public function getInternationalPostalCode()
    {
        return $this->internationalPostalCode;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getNationalPostalCode()
    {
        return $this->nationalPostalCode;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getStreet()
    {
        return $this->street;
    }
}
