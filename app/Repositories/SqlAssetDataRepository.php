<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Managers\DatabaseManager;

class SqlAssetDataRepository
{
    private string $searchedAssetSymbol;

    public function __construct(string $searchedAssetSymbol)
    {
        $this->searchedAssetSymbol = $searchedAssetSymbol;
    }

    public function searchBySymbol()
    {
        $responseData = [];

        $sqlData = DatabaseManager::query()
            ->select('*')
            ->from('stock_info')
            ->where('symbol = :symbol')
            ->setParameter('symbol', $this->searchedAssetSymbol)
            ->execute()
            ->fetchAllAssociative();

        foreach ($sqlData as $responseData) {
            return $responseData;
        }
    }
}
