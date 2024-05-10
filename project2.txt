<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        .response {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Project/ Arman</h1>
    
    <?php
    function get_data($url) {
    }

    function post_data($url, $data) {
    }

    function put_data($url, $data) {
    }

    function delete_data($url) {
    }

    $api_url = 'https://<endpoint-name>.proxy.beeceptor.com/api/products';

    $post_data = json_encode(array(
        'price' => 200,
        'name' => 'Guitar'
    ));
    $post_response = post_data($api_url, $post_data);
    echo "<div class='response'>POST Response: " . $post_response . "</div>";

    $get_response = get_data($api_url);
    echo "<div class='response'>GET Response: " . $get_response . "</div>";

    $product_id = 'ff055a745667b8ffab51'; 
    $get_product_url = $api_url . '/' . $product_id;
    $get_product_response = get_data($get_product_url);
    echo "<div class='response'>GET Product Response: " . $get_product_response . "</div>";

    $put_data = json_encode(array(
        'price' => 500,
        'name' => 'Guitar'
    ));
    $put_product_response = put_data($get_product_url, $put_data);
    echo "<div class='response'>PUT Product Response: " . $put_product_response . "</div>";

    $delete_product_response = delete_data($get_product_url);
    echo "<div class='response'>DELETE Product Response: " . $delete_product_response . "</div>";
    ?>
</body>
</html>
