<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\StockAsset;
use App\Repositories\AssetDataRepository;
use App\Repositories\SqlAssetDataRepository;
use Carbon\Carbon;

class StockService
{
    public function execute()
    {
        if (isset($_GET['asset'])) {

            $assetSymbol = $_GET['asset'];

            $assetDataRepository = new AssetDataRepository($assetSymbol);

            $sqlAssetDataRepository = new SqlAssetDataRepository($assetSymbol);

            if (!empty($sqlAssetDataRepository->searchBySymbol())) {

                $receivedAssettData = $sqlAssetDataRepository->searchBySymbol();

                $dataUpdateTime = Carbon::create($receivedAssettData['time_updated']);
                $difference = $dataUpdateTime->diffInMinutes(Carbon::now());

                if ($difference >= 10) {
                    $assetDataRepository->update();
                    $receivedAssettData = $sqlAssetDataRepository->searchBySymbol();
                    echo ' INFO UPDATED!';
                }
            } else {
                $assetDataRepository->save();
                $receivedAssettData = $sqlAssetDataRepository->searchBySymbol();
            }

            $stockAsset = new StockAsset(
                $assetSymbol,
                (float) $receivedAssettData['open'],
                (float) $receivedAssettData['high'],
                (float)  $receivedAssettData['low'],
                (float)$receivedAssettData['close'],
                (float) $receivedAssettData['adjClose'],
                (float) $receivedAssettData['volume'],
                $receivedAssettData['date'],
                $receivedAssettData['time_updated']
            );

            return $stockAsset;
        }
    }
}
