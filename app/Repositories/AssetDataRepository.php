<?php

declare(strict_types=1);

namespace App\Repositories;

use Scheb\YahooFinanceApi\ApiClient;
use Scheb\YahooFinanceApi\ApiClientFactory;
use App\Managers\DatabaseManager;

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
        $this->save();

        return $this->responseData;
    }

    public function save()
    {
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
                'symbol' => $this->searchedAssetSymbol,
                'open' => $this->responseData['open'],
                'high' => $this->responseData['high'],
                'low' => $this->responseData['low'],
                'close' => $this->responseData['close'],
                'adjClose' => $this->responseData['adjClose'],
                'volume' => $this->responseData['volume'],
                'date' => implode("", $this->responseData['date'])
            ])
            ->execute();
    }
}
