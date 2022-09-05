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
    <form>
        <label>login</label>
        <input name="login" type="text" placeholder="enter your login">
        <label>password</label>
        <input name="password" type="password" placeholder="enter your password">
        <button type="submit" class="login-btn">enter</button>
        <a href="registration.php">registration</a>

        <p class="msg"></p>
    </form>

<script src = "assets/js/jquery-3.6.1.min.js"></script>
<script src = "assets/js/main.js"></script>
</body>
</html>
