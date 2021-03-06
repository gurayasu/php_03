<?php

session_start();
require_once '../classes/UserLogic.php';
require_once '../public/functions.php';
ini_set('display_errors', true);

$result = UserLogic::checkLogin();

if (!$result) {
    $_SESSION['login_err'] = 'Please register as a user!';
    header('Location: signup.php');
    return;
}

$login_user = $_SESSION['login_user'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>マイページ</title>
</head>

<body>
    <h2 class="text-muted m-3">マイページ</h2>
    <form action="../index.php" method="POST">
        <p class="m-3">ユーザー名: <?php echo h($login_user['name']); ?></p>
        <p class="m-3">Email: <?php echo h($login_user['email']); ?></p>
        <input type="hidden" name="username" value="<?php echo h($login_user['name']) ?>">
        <input type="hidden" name="email" value="<?php echo h($login_user['email']) ?>">
        <input type="submit" name="logout" class="form-control w-25 m-3" value="サブスク画面へ">
    </form>
    <form action="logout.php" method="POST">
        <input type="submit" name="logout" class="form-control w-25 m-3" value="ログアウト">
    </form>
</body>

</html>
