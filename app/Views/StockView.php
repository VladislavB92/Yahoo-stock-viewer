<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stocks</title>
</head>

<body>
    <div class="find_asset">
        <form action="/" method="GET">
            <label for="asset">Enter asset symbol: </label>
            <input type="text" id="asset" name="asset">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="show_asset">
        <h2><?php echo $actualAssetData->getSymbol(); ?></h2>
        Date: <?php echo $actualAssetData->getDate(); ?><br>
        Close: <?php echo $actualAssetData->getClose(); ?><br>
        Open: <?php echo $actualAssetData->getOpen(); ?><br>
        Adjusted Closing Price: <?php echo $actualAssetData->getAdjClose(); ?><br>
        High: <?php echo $actualAssetData->getHigh(); ?><br>
        Low: <?php echo $actualAssetData->getLow(); ?><br>
        Volume: <?php echo $actualAssetData->getVolume(); ?><br>

    </div>
</body>

</html>