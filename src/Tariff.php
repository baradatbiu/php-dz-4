<?php
require_once 'Gps.php';

abstract class Tariff implements iTariff
{
  use Gps;

  const MIN_AGE = 18;
  const MAX_AGE = 65;
  const MAX_BOOST_AGE = 21;

  protected $priceKm;
  protected $priceMin;
  protected $age;
  protected $boostFactor = 1;
  protected $error = '';
  protected $gps = false;

  public function __construct($priceKm, $priceMin, $age, $gps = false)
  {
    $this->priceKm = $priceKm;
    $this->priceMin = $priceMin;
    $this->age = $age;
    $this->gps = $gps;

    if ($age < self::MIN_AGE || $age > self::MAX_AGE) {
      throw new Exception('Age does not fit.');
    }
    if ($age >= self::MIN_AGE && $age <= self::MAX_BOOST_AGE) {
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