<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use App\Controllers\StockAssetsController;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$show = (new StockAssetsController)->show();

/*

*/