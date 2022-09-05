<?php
session_start();
if(!$_SESSION['user']){
    header('Location: index.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=  $_SESSION['user']['login']; ?>Профиль</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <form>
        <a href="vendor/logout.php">Exit</a>
        <h2><?=$_SESSION['user']['full_name']?></h2>
        <h3><?=$_SESSION['user']['email']?></h3>
        <img src="<?=$_SESSION['user']['avatar']?>" width="300px">

    </form>
</body>
</html>