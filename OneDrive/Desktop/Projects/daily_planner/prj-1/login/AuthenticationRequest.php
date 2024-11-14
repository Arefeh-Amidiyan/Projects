<?php
session_start();



function dd($value){
     return die(var_dump($value));
}
try {
    $cn = new PDO("mysql:host=localhost;dbname=daily-planner", 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    ]);
} catch (Throwable $exception) {
    exit('Error DB Connection ...');
}
function getUser($email, $password)
{

    global $cn;
    $sql = "SELECT * FROM `user` WHERE user_name = ? and password = ?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $email);
    $result->bindValue(2, $password);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch();
    }
    return false;
}

if (isset($_GET['action']) && $_GET['action'] === 'login') {
    $getUser = getUser($_GET['user_name'],$_GET['password']);
    if ($getUser){
        $_SESSION['user'] = $getUser['id'];
        header("location:../index.php");
    }else{
        header("location:login.php");
    }
}