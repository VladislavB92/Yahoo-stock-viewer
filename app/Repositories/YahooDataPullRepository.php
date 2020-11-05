<?php

declare(strict_types=1);

namespace App\Repositories;

use Scheb\YahooFinanceApi\ApiClient;
use Scheb\YahooFinanceApi\ApiClientFactory;

class YahooDataPullRepository
{
    private string $searchedAssetSymbol;

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

        $stockData = json_decode(json_encode($historicalData[0]), true);

        return $stockData;
    }
}
