<?php
require_once 'Tariff.php';

class BaseTariff extends Tariff
{
  public function __construct($age, $gps = false)
  {
    parent::__construct(10, 3, $age, $gps);
  }
}
