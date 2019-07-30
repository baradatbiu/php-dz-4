<?php
require_once '../src/BaseTariff.php';
require_once '../src/DailyTariff.php';
require_once '../src/HourlyTariff.php';
require_once '../src/StudentTariff.php';

$base = new BaseTariff(19, true);
echo $base->countingCost(7, 10);
echo '<br>';
$base = new HourlyTariff(33, true, true);
echo $base->countingCost(10, 130);
echo '<br>';
$base = new DailyTariff(25, true, true);
echo $base->countingCost(45, 2000);
echo '<br>';
$base = new StudentTariff(27, true);
echo $base->countingCost(17, 100);