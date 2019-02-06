<?php

namespace klareNNNs\correosexpress\Entity;


class Request
{
    private $order;
    private $addressee;
    private $sender;

    public function __construct(Order $order, Addressee $addressee, Sender $sender)
    {

        $this->order = $order;
        $this->addressee = $addressee;
        $this->sender = $sender;
    }

    public function build()
    {
        return array(
            "solicitante"=> $this->order->getClientCode(),
            "fecha"=> ($this->order->getDate())->format('dmY'),
            "codRte"=> $this->sender->getCode(),
            "nomRte"=> $this->sender->getName(),
            "nifRte"=> $this->sender->getNif(),
            "dirRte"=> $this->sender->getAddress()->getStreet(),
            "pobRte"=> $this->sender->getAddress()->getCity(),
            "codPosNacRte"=> $this->sender->getAddress()->getNationalPostalCode(),
            "paisISORte"=> $this->sender->getAddress()->getCountry(),
            "codPosIntRte"=> $this->sender->getAddress()->getInternationalPostalCode(),
            "contacRte"=> $this->sender->getName(),
            "telefRte"=> $this->sender->getPhone(),
            "emailRte"=> $this->sender->getEmail(),
            "codDest"=> $this->addressee->getCode(),
            "nomDest"=> $this->addressee->getName(),
            "nifDest"=> $this->addressee->getNif(),
            "dirDest"=> $this->addressee->getAddress()->getStreet(),
            "pobDest"=> $this->addressee->getAddress()->getCity(),
            "codPosNacDest"=> $this->addressee->getAddress()->getNationalPostalCode(),
            "paisISODest"=> $this->addressee->getAddress()->getCountry(),
            "codPosIntDest"=> $this->addressee->getAddress()->getInternationalPostalCode(),
            "contacDest"=> $this->addressee->getName(),
            "telefDest"=> $this->addressee->getPhone(),
            "emailDest"=> $this->addressee->getEmail(),
            "observac"=> $this->order->getComments(),
            "numBultos"=> $this->order->getNumberOfPackages(),
            "kilos"=> $this->order->getWeight(),
            "producto"=> $this->order->getProductCode(),
            "portes"=> $this->order->getShippingPaidStatus(),
            "reembolso"=> $this->order->getReembolso(),
            "listaBultos"=> [[
                "alto"=> "",
                "ancho"=> "",
                "codBultoCli"=> "",
                "codUnico"=> "",
                "descripcion"=> "",
                "kilos"=> "",
                "largo"=> "",
                "observaciones"=> "",
                "orden"=> "1",
                "referencia"=> "",
                "volumen"=> ""
            ]],
            "codDirecDestino"=> "",
            "password"=> "string",
            "listaInformacionAdicional"=> [[
                "tipoEtiqueta"=>"1",
                "etiquetaPDF"=> "S"
            ]]
        );
    }
}