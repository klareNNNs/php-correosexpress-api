<?php

namespace klareNNNs\correosexpress\Entity;


use klareNNNs\correosexpress\Entity\Exception\EmptyPhoneNumberException;

class Contact
{
    private $code;
    private $name;
    private $nif;
    private $phone;
    private $email;
    private $address;

    public function __construct($code, $name, $nif, $phone, $email, Address $address)
    {

        $this->code = $code;
        $this->name = $name;
        $this->nif = $nif;
        $this->setPhone($phone);
        $this->email = $email;
        $this->address = $address;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNif()
    {
        return $this->nif;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAddress() : Address
    {
        return $this->address;
    }

    /**
     * @param string $phone
     * @throws \Exception
     */
    public function setPhone(string $phone)
    {
        if (empty($phone)) {
            throw new EmptyPhoneNumberException("Phone number cannot be empty");
        }

        $this->phone = $phone;
    }
}
