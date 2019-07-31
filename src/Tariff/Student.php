<?php

class Student extends Tariff
{
  const MAX_AGE = 26;

  public function __construct($priceKm, $priceMin, $age, $gps = false)
  {
    if ($age >= self::MAX_AGE) {
      throw new Exception('Age does not fit.');
    }
    parent::__construct($priceKm, $priceMin, $age, $gps);
  }
}