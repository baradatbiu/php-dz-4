<?php
require_once 'Tariff.php';

class StudentTariff extends Tariff
{
  public function __construct($age, $gps = false)
  {
    if ($age >= 26) {
      $this->error = 'Age does not fit.';
    }
    parent::__construct(4, 1, $age, $gps);
  }
}