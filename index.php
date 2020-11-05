<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use App\Controllers\StockAssetsController;
use Carbon\Carbon;

printf("Right now is %s", Carbon::now()->toDateTimeString());

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$show = (new StockAssetsController)->show();
