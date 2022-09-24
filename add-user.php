<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);
$users = [
        'json' => ['id' => '31',
        'first_name' => 'Joshua',
        'last_name' => 'Hong',
        'age' => '26',
        'gender' => 'Male',
        'email' => 'joshuahong@gmail.com',
        'phone' => '09126776231',
        'blood_group' => 'A',
        'image' => 'https://pbs.twimg.com/media/FQDS3hvaMAEQodE?format=jpg&name=4096x4096',

        ]
];

$response = $client->post('https://dummyjson.com/users/add', $users);
$code = $response->getStatusCode();
$body = $response->getBody();
$user = json_decode($body);

?>
<html>
    <head>
        <title>ADD USER</title>
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