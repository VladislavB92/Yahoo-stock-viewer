<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stocks info</title>
</head>

<body>
    <div class='header'>
        <h1>Yahoo stocks info</h1>
    </div>
    <div class="find_asset">
        <form action="/" method="GET">
            <label for="asset">Enter correct asset symbol: </label>
            <input type="text" id="asset" name="asset">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="show_asset">
        <?php if (isset($_GET['asset'])) : ?>
            <h2><?php echo $actualAssetData->getSymbol(); ?></h2>
            Date: <?php echo $actualAssetData->getDate(); ?><br>
            Close: <?php echo $actualAssetData->getClose(); ?><br>
            Open: <?php echo $actualAssetData->getOpen(); ?><br>
            Adjusted Closing Price: <?php echo $actualAssetData->getAdjClose(); ?><br>
            High: <?php echo $actualAssetData->getHigh(); ?><br>
            Low: <?php echo $actualAssetData->getLow(); ?><br>
            Volume: <?php echo $actualAssetData->getVolume(); ?><br>
            Time updated: <?php echo $actualAssetData->getTimeUpdated(); ?>
        <?php endif; ?>

    </div>
</body>

</html>