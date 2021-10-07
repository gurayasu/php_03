<?php


session_start();
require_once '../classes/UserLogic.php';
ini_set('display_errors', true);


//Erroer
$err = [];

//Varidation

if (!$username = filter_input(INPUT_POST, 'username')) {
    $err['username'] = '※ Please input username.';
}

if (!$email = filter_input(INPUT_POST, 'email')) {
    $err['email'] = '※ Please input email.';
}

if (!$password = filter_input(INPUT_POST, 'password')) {
    $err['password'] = '※ Please input password.';
}

if (!$manager = filter_input(INPUT_POST, 'manager')) {
    $err['manager'] = '※ Please select manager or not.';
}


if (count($err) > 0) {
    //login
    $_SESSION = $err;
    header('Location: login_form_manager.php');
    return;
}

$result = UserLogic::loginManager($username, $email, $password);

//Login 失敗！
if (!$result) {
    header('Location: login_form_manager.php');
    return;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>管理者ログイン完了</title>
</head>

<body>
    <h2 class="text-muted">管理者ログイン完了</h2>
    <p>管理者ログイン完了しました！</p>
    <p><a href="manager.php">管理者ページへ</a></p>
</body>

</html>
