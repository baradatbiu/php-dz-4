<?php

class Hourly extends Tariff
{
  use Driver;

  private $isDriver;

  public function __construct($priceKm, $priceMin, $age, $gps = false, $isDriver = false)
  {
    parent::__construct($priceKm, $priceMin, $age, $gps);
    $this->isDriver = $isDriver;
  }

  public function countingCost($Km, $Min)
  {
    $arrayTime = explode(':', $Min);
    $hours = $arrayTime[0];
    $minutes = $arrayTime[1];
    $timeMin = $hours * 60 + $minutes;
    $cost = ceil(($timeMin) / 60) * $this->priceMin;
    if ($this->gps) {
      $cost += $this->countingPriceGps($timeMin);
    }
    if ($this->isDriver) {
      $cost += $this->getPriceDriver();
    }
    return $cost;
  }
}
