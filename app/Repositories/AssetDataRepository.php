<?php

declare(strict_types=1);

namespace App\Repositories;

use Scheb\YahooFinanceApi\ApiClient;
use Scheb\YahooFinanceApi\ApiClientFactory;
use App\Managers\DatabaseManager;
use Carbon\Carbon;

class AssetDataRepository
{
    private string $searchedAssetSymbol;
    private array $responseData = [];

    public function __construct(string $searchedAssetSymbol)
    {
        $this->searchedAssetSymbol = $searchedAssetSymbol;
    }

    public function searchBySymbol()
    {
        $client = ApiClientFactory::createApiClient();

        $historicalData = $client->getHistoricalData(
            $this->searchedAssetSymbol,
            ApiClient::INTERVAL_1_DAY,
            new \DateTime("today"),
            new \DateTime("now")
        );

        $this->responseData = json_decode(json_encode($historicalData[0]), true);
    }

    public function save()
    {
        $this->searchBySymbol();

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
                'date' => ':date',
                'time_updated' => ':time_updated'
            ])
            ->setParameters([
                'symbol' => $this->searchedAssetSymbol,
                'open' => $this->responseData['open'],
                'high' => $this->responseData['high'],
                'low' => $this->responseData['low'],
                'close' => $this->responseData['close'],
                'adjClose' => $this->responseData['adjClose'],
                'volume' => $this->responseData['volume'],
                'date' => implode(" ", $this->responseData['date']),
                'time_updated' => Carbon::now()->toDateTimeString()
            ])
            ->execute();
    }

    public function update()
    {
        $this->searchBySymbol();

        DatabaseManager::query()
            ->update('stock_info')
            ->set('open', ':open')
            ->set('high', ':high')
            ->set('low', ':low')
            ->set('close', ':close')
            ->set('adjClose', ':adjClose')
            ->set('volume', ':volume')
            ->set('date', ':date')
            ->set('time_updated', ':time_updated')
            ->where('symbol = :symbol')
            ->setParameters([
                'symbol' => $this->searchedAssetSymbol,
                'open' => $this->responseData['open'],
                'high' => $this->responseData['high'],
                'low' => $this->responseData['low'],
                'close' => $this->responseData['close'],
                'adjClose' => $this->responseData['adjClose'],
                'volume' => $this->responseData['volume'],
                'date' => implode(" ", $this->responseData['date']),
                'time_updated' => Carbon::now()->toDateTimeString()
            ])
            ->execute();
    }
}
