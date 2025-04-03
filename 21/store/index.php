<?php

require_once 'load.php';

use App\Controllers\Store;


// $cairo = new Store;
$cairo = new Store('Cairo', 500);

dump($cairo);


$cairo->report();

$cairo->sales(10);
$cairo->report();

$cairo->sales(50);
$cairo->report();

// // New Branch
$alex_downtown = new Store('Alex Downtown', 1200);
dump($alex_downtown);
dump($cairo);

dump($alex_downtown);

$alex_downtown->sales(200);
$alex_downtown->report();

dump($cairo);

// // Cairo New Sales
$cairo->sales(10);
$cairo->report();
$alex_downtown->report();