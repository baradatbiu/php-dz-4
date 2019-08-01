<?php

class Daily extends Tariff
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
    $day = $arrayTime[0];
    $hours = $arrayTime[1];
    $minutes = $arrayTime[2];
    $timeMin = $day * 24 * 60 + $hours * 60 + $minutes;
    $countDays = ceil(($timeMin - 29) / 1440);
    if ($countDays === 0) {
      $countDays = 1;
    }
    $cost = $countDays * $this->priceMin;
    if ($this->gps) {
      $cost += $this->countingPriceGps($timeMin);
    }
    if ($this->isDriver) {
      $cost += $this->priceDriver;
    }
    return $cost;
  }
}