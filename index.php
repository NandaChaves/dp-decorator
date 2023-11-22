<?php
/*Decorator é um padrão de design estrutural que permite anexar novos
comportamentos a objetos colocando esses objetos dentro de objetos 
wrapper especiais que contêm os comportamentos.*/

//toda face que implementar esta interface deve ter uma funcao getPrice
interface Booking{
    public function getCost();
}

class BasicBooking implements Booking{
    protected $basicPrice = 50;

    public function getCost(){
        return $this->basicPrice;
    }
}

abstract class BokkingDecorator implements Booking
{
    protected $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking; 
    }

    public function getCost()
    {
       return $this->booking->getCost();
    } 
}

class Wifi extends BokkingDecorator{
    protected $wifiPrice = 5;
    public function getCost()
    {
        return $this->booking->getCost()+$this->wifiPrice;
    }
}

class Breakfeast extends BokkingDecorator{
    protected $breakfeast = 10;
    public function getCost()
    {
        return $this->booking->getCost() + $this->breakfeast;
    }
}

$booking = new Breakfeast(new Breakfeast(new BasicBooking));
var_dump($booking->getCost());
?>