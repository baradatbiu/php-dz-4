<?php
require_once 'Tariff.php';
require_once 'Driver.php';

class DailyTariff extends Tariff
{
  use Driver;
  public function __construct($age, $gps = false, $isDriver = false)
  {
    parent::__construct(1, 1000, $age, $gps);
    $this->isDriver = $isDriver;
  }

  public function countingCost($Km, $Min)
  {
    if ($this->error) {
      return $this->error;
    }
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