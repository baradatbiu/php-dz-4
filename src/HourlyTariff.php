<?php
require_once 'Tariff.php';
require_once 'Driver.php';

class HourlyTariff extends Tariff
{
  use Driver;
  public function __construct($age, $gps = false, $isDriver = false)
  {
    parent::__construct(0, 200, $age, $gps);
    $this->isDriver = $isDriver;
  }

  public function countingCost($Km, $Min)
  {
    if ($this->error) {
      return $this->error;
    }
    $arrayTime = explode(':', $Min);
    $hours = $arrayTime[0];
    $minutes = $arrayTime[1];
    $timeMin = $hours * 60 + $minutes;
    $cost = ceil(($timeMin) / 60) * $this->priceMin;
    if ($this->gps) {
      $cost += $this->countingPriceGps($timeMin);
    }
    if ($this->isDriver) {
      $cost += $this->priceDriver;
    }
    return $cost;
  }
}
