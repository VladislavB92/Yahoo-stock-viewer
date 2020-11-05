<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use App\Controllers\StockAssetsController;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$show = (new StockAssetsController)->show();

/*
DatabaseManager::query()
    ->insert('stock_info')
    ->values([
        'symbol' => ':symbol',
        'open' => ':open',
        'high' => ':high',
        'low' => ':low',
        'close' => ':close',
        'adjClose' => ':adjClose',
        'volume' => ':volume',
        'date' => ':date'
    ])
    ->setParameters([
        'symbol' => $searchedStock,
        'open' => $open,
        'high' => $high,
        'low' => $low,
        'close' => $close,
        'adjClose' => $adjClose,
        'volume' => $volume,
        'date' => $date
    ])
    ->execute();
*/