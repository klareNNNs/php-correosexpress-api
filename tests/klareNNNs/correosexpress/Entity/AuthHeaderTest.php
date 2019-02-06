<?php

use PHPUnit\Framework\TestCase;
use klareNNNs\correosexpress\Entity\AuthHeader;

class AuthHeaderTest extends TestCase
{
    public function testCanConstructAuthHeader()
    {
        $user = 'user';
        $password = 'pwd';
        $auth = new AuthHeader($user, $password);

        $this->assertInstanceOf('klareNNNs\correosexpress\Entity\AuthHeader', $auth);
        $this->assertEquals($user, $auth->getUser());
        $this->assertEquals($password, $auth->getPassword());
    }
}

