<?php
require_once '../src/Gps.php';
require_once '../src/Driver.php';
require_once '../src/iTariff.php';
require_once '../src/Tariff.php';
require_once '../src/Tariff/Base.php';
require_once '../src/Tariff/Daily.php';
require_once '../src/Tariff/Hourly.php';
require_once '../src/Tariff/Student.php';

echo '<pre>';
try {
  $base = new Base(10, 3, 19, true);
  echo $base->countingCost(7, 10) . PHP_EOL;
} catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}
try {
  $base = new Hourly(0, 200, 33, true, true);
  echo $base->countingCost(10, 130) . PHP_EOL;
} catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}
try {
  $base = new Daily(1, 1000, 25, true);
  echo $base->countingCost(45, 2000) . PHP_EOL;
} catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}
try {
  $base = new Student(4, 1, 27, true);
  echo $base->countingCost(17, 100) . PHP_EOL;
} catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}
