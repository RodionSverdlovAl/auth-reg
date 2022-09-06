<?php
session_start();
require_once 'connect.php';

$full_name = $_POST['full_name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

$error_fields = [];

if($login === ''){
    $error_fields[] = 'login';
}
if($password === ''){
    $error_fields[] = 'password';
}
if($full_name === ''){
    $error_fields[] = 'full_name';
}
if($email === '' || !filter_var($email,FILTER_VALIDATE_EMAIL)){
    $error_fields[] = 'email';
}
if($password_confirm === ''){
    $error_fields[] = 'password_confirm';
}

if(!$_FILES['avatar']){
    $error_fields[] = 'avatar';
}
if(!empty($error_fields)){
    $response =[
        "status" => false,
        "massage" => 'проверьте правильность полей',
        "type" => 1,
        "fields" => $error_fields
    ];
    echo json_encode($response);
    die();
}



if($password === $password_confirm){
    $path = 'uploads/' . time() . $_FILES['avatar']['name'];
    if(!move_uploaded_file($_FILES['avatar']['tmp_name'], '../'.$path)){ // проверяем загрузку картинки (если не загружена)
        $response =[
            "status" => false,
            "massage" => 'ошибка при загрузке картинки',
            "type" => 2
        ];
        echo json_encode($response);
    } // если загружена
    else{
        $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
        if(mysqli_num_rows($check_user)>0) { // если юзер с таким логином уже есть то мы выводим меседж
            $response = [
                "status" => false,
                "massage" => 'юзер с таким логином уже существует',
                "type" => 3
            ];
            echo json_encode($response);
            die();
        }else{
            // регаем юзера
            $password = md5($password);
            mysqli_query($connect, "INSERT INTO `users` (`id`, `full_name`, `login`, `password`, `avatar`, `email`)
            VALUES (NULL, '$full_name', '$login', '$password' , '$path', '$email')");
            // когда зарегали кидаем ответ на джаваскрипт
            $response =[
                "status" => true,
                "massage" => 'Регистрация прошла успешно'
            ];
            echo json_encode($response);
        }
    }
}else{
    $response =[
        "status" => false,
        "massage" => 'пароли не совпадают',
    ];
    echo json_encode($response);
}

