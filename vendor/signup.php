<?php
session_start();
require_once 'connect.php';

$full_name = $_POST['full_name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if($password === $password_confirm){
   print_r($_FILES);
    $path = 'uploads/' . time() . $_FILES['avatar']['name'];
    if(!move_uploaded_file($_FILES['avatar']['tmp_name'], '../'.$path)){
        $_SESSION['massage'] = 'Не удалось загрузить фотографию';
        header('Location: ../registration.php');
    }
    // проверяем существует ли юзер с таким аккаунтом
    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
    if(mysqli_num_rows($check_user)>0){ // если юзер с таким логином уже есть то мы выводим меседж
        $_SESSION['massage'] = 'юзер с таким логином уже существует';
        header('Location: ../registration.php');
    }
    else{ // продолжаем регистрацию
        $password = md5($password);
        mysqli_query($connect, "INSERT INTO `users` (`id`, `full_name`, `login`, `password`, `avatar`, `email`)
        VALUES (NULL, '$full_name', '$login', '$password' , '$path', '$email')");
        header('Location: ../index.php');
    }

}else{
    $_SESSION['massage'] = 'пароли не совпадают';
    header('Location: ../registration.php');
}
