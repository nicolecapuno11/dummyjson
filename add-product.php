<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);
$products = [
        'json' => ['id' => '31',
        'title' => 'Seventeen 4th Album - Face the Sun',
        'description' => 'SEVENTEEN - [Face the Sun] 4th Album 5 Version SET',
        'price' => '5000',
        'brand' => 'Seventeen',
        'category' => 'Album',
        'thumbnail' => 'https://cdn.shopify.com/s/files/1/0247/0871/0485/products/73ec8ea879f00a2e3c943e13f99331d38ae729013cac2fb931fcd28baec346d6_b2678209-4cd3-49b9-b2b8-0dfc1693751f_720x.jpg?v=1653215483'
        ]
];

$response = $client->post('https://dummyjson.com/products/add', $products);
$code = $response->getStatusCode();
$body = $response->getBody();
$product = json_decode($body);

?>
<html>
    <head>
        <title>ADD PRODUCT</title>
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