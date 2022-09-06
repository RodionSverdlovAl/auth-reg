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
        <label>full name</label>
        <input name="full_name" type="text" placeholder="enter your full name">
        <label>login</label>
        <input name="login" type="text" placeholder="enter your login">
        <label>email</label>
        <input name="email" type="text" placeholder="enter your email">
        <label>profile image</label>
        <input name="avatar" type="file">
        <label>password</label>
        <input name="password" type="password" placeholder="enter your password">
        <label>repeat password</label>
        <input name="password_confirm" type="password" placeholder="repeat password">
        <button type="submit" class="registration-btn">registration</button>
        <a href="index.php">authentication</a>
        <p class="msg">massage </p>
    </form>

    <script src = "assets/js/jquery-3.6.1.min.js"></script>
    <script src = "assets/js/main.js"></script>
</body>
</html>
