<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\StockService;

class StockAssetsController
{
    public function show()
    {
        $actualAssetData = (new StockService)->execute();


        return require_once __DIR__ . '/../Views/StockView.php';
    }
}