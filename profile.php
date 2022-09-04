<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=  $_SESSION['user']['login']; ?>Профиль</title>
</head>
<body>
    <form>
        <h2><?=$_SESSION['user']['full_name']?></h2>
        <h3><?=$_SESSION['user']['email']?></h3>
        <img src="<?=$_SESSION['user']['avatar']?>" width="500px">

    </form>
</body>
</html>