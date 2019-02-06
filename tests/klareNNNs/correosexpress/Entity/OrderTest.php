<?php

use klareNNNs\correosexpress\Entity\Order;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testItShouldCreateCorrectOrder()
    {

        $clientCode = '1';
        $date = new \DateTime('now');
        $comments = 'ninguna';
        $numberOfPackages = '1';
        $weight = '1';
        $productCode = '63';
        $shippingPaid = 'P';
        $reembolso = '';

        $order = new Order($clientCode, $date, $comments, $numberOfPackages, $weight, $productCode, $shippingPaid, $reembolso);

        $this->assertEquals($clientCode, $order->getClientCode());
        $this->assertEquals($date, $order->getDate());
        $this->assertEquals($comments, $order->getComments());
        $this->assertEquals($numberOfPackages, $order->getNumberOfPackages());
        $this->assertEquals($weight, $order->getWeight());
        $this->assertEquals($productCode, $order->getProductCode());
        $this->assertEquals($shippingPaid, $order->getShippingPaidStatus());
        $this->assertEquals($reembolso, $order->getReembolso());
    }

}