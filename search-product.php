<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);
?>
<html>
<head>
        <title>SEARCH PRODUCT</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
        <div class="container">
                <form action="search-product.php" method="POST">
                        <input type="text" class="form-control" placeholder="Search Product" name="search_product">
                        <button class="btn btn-outline-secondary" type="submit" id="search">Search<i class="fas fa-search"></i</button>
                </form>
        </div>
</body>
</html>

<?php
$products = [
        'products' => []
];
if (isset($_POST['search_product'])){
        $search_product = $_POST['search_product'];
        $response = $client->get('https://dummyjson.com/products/search?q=' . $search_product);
        $code = $response->getStatusCode();
        $body = $response->getBody();
        $products = json_decode($body, true);
?>

<html>
    <head>
        <title>SEARCH PRODUCT</title>
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
                <?php foreach($products['products'] as $product){ ?>
                    <tr>
                        <th scope="row"><?php echo $product['id']; ?></th>
                        <td><?php echo $product['title']; ?></td>
                        <td><?php echo $product['description']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td><?php echo $product['brand']; ?></td>
                        <td><?php echo $product['category']; ?></td>
                        <td><img src="<?php echo $product['thumbnail'];?>" width="100px"></td>
                    </tr>
                <?php 
        }
}?>
                </tbody>
            </table>
        </div>
    </body>
</html>