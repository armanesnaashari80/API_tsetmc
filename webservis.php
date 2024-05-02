
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arman...</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #000;
            color: #FFD700;
            padding: 1rem 0;
            text-align: center;
        }
        .time {
            color: #fff;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
        }
        th, td {
            border: 3px solid #ccc;
            padding: 1.5rem;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Closing Prices</h1>
        <div class="time">
            <?php echo "ٌ What's time now : " . date("H:i:s"); ?>
        </div>
    </div>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Closing Price</th>
                </tr>
            </thead>
            <tbody>



                <?php
                $apiUrl = 'http://cdn.tsetmc.com/api/ClosingPrice/GetMarketMap';
                $params = array(
                    'market' => 0,
                    'size' => 1360,
                    'sector' => 0,
                    'typeSelected' => 1
                );
                $queryString = http_build_query($params);
                $requestUrl = $apiUrl . '?' . $queryString;
                $response = file_get_contents($requestUrl);
                if ($response !== false) {
                    $responseData = json_decode($response, true);
                    foreach ($responseData as $symbol => $closingPrice) {
                        echo "<tr><td>$symbol</td><td>";
                        if (is_array($closingPrice)) {
                            echo implode('<br>', $closingPrice);
                        } else {
                            echo $closingPrice;
                        }
                        echo "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='2' class='error'>Error fetching data from the API.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
