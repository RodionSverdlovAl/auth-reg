<?php
session_start();
if($_SESSION['user']){
    header('Location: ../profile.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <form method="post" action="vendor/signin.php">
        <label>login</label>
        <input name="login" type="text" placeholder="enter your login">
        <label>password</label>
        <input name="password" type="password" placeholder="enter your password">
        <button type="submit">enter</button>
        <a href="registration.php">registration</a>

        <p class="msg">
            <?php
            echo $_SESSION['massage'];
            unset($_SESSION['massage']);
            ?>
        </p>
    </form>
</body>
</html>
