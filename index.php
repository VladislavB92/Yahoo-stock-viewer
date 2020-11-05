<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';
require  'app/Views/StockView.php';

use Scheb\YahooFinanceApi\ApiClient;
use Scheb\YahooFinanceApi\ApiClientFactory;
use GuzzleHttp\Client;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$options = [];
$guzzleClient = new Client($options);
$client = ApiClientFactory::createApiClient($guzzleClient);


if(isset($_GET['asset'])){
    $searchedStock = $_GET['asset'];

    $historicalData = $client->getHistoricalData(
        $searchedStock,
        ApiClient::INTERVAL_1_DAY,
        new \DateTime("today"),
        new \DateTime("now")
    );
    
    var_dump($historicalData);
    
    $stockData = json_decode(json_encode($historicalData[0]), true);
    
    $date = $stockData['date'];
    $open = $stockData['open'];
    $high = $stockData['high'];
    $low = $stockData['low'];
    $close = $stockData['close'];
    $adjClose = $stockData['adjClose'];
    $volume = $stockData['volume'];
}