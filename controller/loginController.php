<?php
require_once ('../model/user/UserDao.class.php');

session_start();
$userLogin = new UserDao();
$result = $userLogin->login($_POST["user"],$_POST["password"]);

if($result){
    $_SESSION["login"] = "valid";
    header("Location: ../view/modules/instructor/instructor.php");
}else{
    $_SESSION["login"] = "invalid";
    header("Location: ../view/login.php");
}

?>