<?php
$connect = mysqli_connect('localhost', 'root', '', 'auth');
if(!$connect){
    die('error connect to database');
}