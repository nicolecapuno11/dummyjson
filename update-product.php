<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);
$products = [
        'json' => [
                'title' => 'Face the Sun'
        ]
];
$response = $client->put('https://dummyjson.com/products/1', $products);
$code = $response->getStatusCode();
$body = $response->getBody();
$product = json_decode($body);
?>

<html>
    <head>
        <title>UPDATE PRODUCT</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <table class="table table-success table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Category</th>
                    <th scope="col">Thumbnail</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $product->id ?></th>
                        <td><?php echo $product->title ?></td>
                        <td><?php echo $product->description ?></td>
                        <td><?php echo $product->price ?></td>
                        <td><?php echo $product->brand ?></td>
                        <td><?php echo $product->category ?></td>
                        <td><img src="<?php echo $product->thumbnail?>" width="100px"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
