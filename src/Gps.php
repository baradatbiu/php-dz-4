<?php

trait Gps
{
  private $minCountMinutes = 60;
  private $priceGps = 15;

  public function countingPriceGps($Min)
  {
    if ($Min < $this->minCountMinutes) {
      $Min = $this->minCountMinutes;
    }
    return (ceil($Min / $this->minCountMinutes) * $this->priceGps);
  }
}