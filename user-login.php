<?php
require_once "vendor/autoload.php";
  
use GuzzleHttp\Client;
  
$client = new Client([
    'base_uri' => 'https://dummyjson.com/',
]);
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>USER LOGIN</title>
</head>

<body>  
<form method="POST" action="user-login.php">
        <h2 class="m-5">USER LOGIN</h2>
        <div class="form-floating m-5">
            <input type="username" class="form-control" id="username" name="username" placeholder="Username">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating m-5">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
            <input class="btn btn-primary mx-auto m-4" type="submit" value="Submit" name="submit">
        </div>
    </form>

<?php
if (isset($_POST['submit'])) {
    try {

        $users = [
            'json' => [
                'username' => $_POST['username'],
                'password' => $_POST['password']
            ]
        ];

        $response = $client->post('https://dummyjson.com/auth/login', $users);
        $code = $response->getStatusCode();
        $body = $response->getBody();
        $users = json_decode($body, true); ?>

        <div class="alert alert-success m-5" role="alert">
            <?php echo "Login Successful! Your Token is: " . $users['token']; ?>
        </div>

    <?php
    } catch (Exception $e) { ?>
        <div class="alert alert-danger m-5" role="alert">
            <?php echo "Login Failed"; ?>
        </div>
<?php
    }
}
?>
</body>
</html>
