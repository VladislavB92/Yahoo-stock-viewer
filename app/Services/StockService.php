<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\YahooDataPullRepository;

use App\Models\StockAsset;

class StockService
{
    public function execute()
    {
        if (isset($_GET['asset'])) {

            $assetSymbol = $_GET['asset'];

            $stockPullRepository = new YahooDataPullRepository($assetSymbol);

            $receivedAssettData = $stockPullRepository->searchBySymbol();

            $stockAsset = new StockAsset(
                $assetSymbol,
                $receivedAssettData['open'],
                $receivedAssettData['high'],
                $receivedAssettData['low'],
                $receivedAssettData['close'],
                $receivedAssettData['adjClose'],
                $receivedAssettData['volume'],
                $receivedAssettData['date']['date']
            );
        }
        return $stockAsset;
    }
}
