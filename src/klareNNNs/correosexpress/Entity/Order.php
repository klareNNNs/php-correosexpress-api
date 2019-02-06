<?php

namespace klareNNNs\correosexpress\Entity;


final class Order
{

    private $clientCode;
    private $date;
    private $comments;
    private $numberOfPackages;
    private $weight;
    private $productCode;
    private $shippingPaidStatus;
    private $reembolso;

    public function __construct(
        string $clientCode,
        \DateTime $date,
        string $comments,
        string $numberOfPackages,
        string $weight,
        string $productCode,
        string $shippingPayed,
        string $reembolso
    ) {
        $this->clientCode = $clientCode;
        $this->date = $date;
        $this->comments = $comments;
        $this->numberOfPackages = $numberOfPackages;
        $this->weight = $weight;
        $this->productCode = $productCode;
        $this->shippingPaidStatus = $shippingPayed;
        $this->reembolso = $reembolso;
    }

    public function getClientCode(): string
    {
        return $this->clientCode;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function getComments(): string
    {
        return $this->comments;
    }

    public function getNumberOfPackages(): string
    {
        return $this->numberOfPackages;
    }

    public function getWeight(): string
    {
        return $this->weight;
    }

    public function getProductCode(): string
    {
        return $this->productCode;
    }

    public function getReembolso(): string
    {
        return $this->reembolso;
    }

    public function getShippingPaidStatus(): string
    {
        return $this->shippingPaidStatus;
    }


}