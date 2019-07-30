<?php

trait Gps
{
  private $priceGps = 15;

  public function countingPriceGps($Min)
  {
    if ($Min < 60) {
      $Min = 60;
    }
    return (ceil($Min / 60) * $this->priceGps);
  }
}