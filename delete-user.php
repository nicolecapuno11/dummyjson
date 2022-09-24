<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);
$users = [
        'json' => [
                'firstName' => 'Terry',
                'lastName' => 'Medhurst',
                'age' => '50',
                'gender' => 'male',
                'email' => 'atuny0@sohu.com',
                'phone' => '+63 791 675 8914',
                'bloodGroup' => 'A-',
                'image' => 'thumbnail.jpg'
        ] 
];
$response = $client->delete('https://dummyjson.com/users/1');
$code = $response->getStatusCode();
$body = $response->getBody();
$user = json_decode($body);
?>

<html>
    <head>
        <title>DELETE USER</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <table class="table table-success table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Blood Type</th>
                    <th scope="col">Image</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row"><?php echo $user->id ?></th>
                        <td><?php echo $user->firstName ?></td>
                        <td><?php echo $user->lastName ?></td>
                        <td><?php echo $user->age ?></td>
                        <td><?php echo $user->gender ?></td>
                        <td><?php echo $user->email ?></td>
                        <td><?php echo $user->phone ?></td>
                        <td><?php echo $user->bloodGroup ?></td>
                        <td><img src="<?php echo $user->image?>" width="100px"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>