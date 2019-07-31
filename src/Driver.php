<?php

trait Driver
{
  private $priceDriver = 100;

  public function getPriceDriver()
  {
    return $this->priceDriver;
  }
}