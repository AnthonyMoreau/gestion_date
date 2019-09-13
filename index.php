<?php

require "class/DATE/gestion_date.php";
use DATE\gestion_date;


$date = new gestion_date();
$day_date = $date->day_date("/");

echo $day_date;