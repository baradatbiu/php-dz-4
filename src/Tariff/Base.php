<?php

class Base extends Tariff
{
  public function __construct($priceKm, $priceMin, $age, $gps = false)
  {
    parent::__construct($priceKm, $priceMin, $age, $gps);
  }
}
