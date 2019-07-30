<?php
require_once 'iTariff.php';
require_once 'Gps.php';

abstract class Tariff implements iTariff
{
  use Gps;

  protected $priceKm;
  protected $priceMin;
  protected $age;
  protected $boostFactor = 1;
  protected $error = '';
  protected $gps = false;

  public function __construct($priceKm, $priceMin, $age, $gps)
  {
    $this->priceKm = $priceKm;
    $this->priceMin = $priceMin;
    $this->age = $age;
    $this->gps = $gps;

    if ($age < 18 || $age > 65) {
      $this->error = 'Age does not fit.';
    }
    if ($age >= 18 && $age <= 21) {
      $this->boostFactor = 1.1;
    }
  }

  public function countingCost($Km, $Min)
  {
    if ($this->error) {
      return $this->error;
    }
    $cost = ($Km * $this->priceKm + $Min * $this->priceMin) * $this->boostFactor;
    if ($this->gps) {
      $cost += $this->countingPriceGps($Min);
    }
    return $cost;
  }
}