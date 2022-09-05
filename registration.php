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
    <form method="post" action="vendor/signup.php" enctype="multipart/form-data">
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
        <button type="submit">registration</button>
        <a href="index.php">authentication</a>
        <p class="msg">
            <?php
            echo $_SESSION['massage'];
            unset($_SESSION['massage']);
            ?>
        </p>
    </form>
</body>
</html>
